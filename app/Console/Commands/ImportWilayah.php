<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ImportWilayah extends Command
{
    protected $signature   = 'wilayah:import {--retry-failed : Hanya import desa yang gagal/belum ada, tanpa truncate}';
    protected $description = 'Import data kecamatan & desa Jawa Tengah dari API wilayah.web.id';

    // Kode semua kabupaten/kota Jawa Tengah
    private array $kabupatenIds = [
        '3301','3302','3303','3304','3305','3306','3307','3308','3309','3310',
        '3311','3312','3313','3314','3315','3316','3317','3318','3319','3320',
        '3321','3322','3323','3324','3325','3326','3327','3328','3329',
        '3371','3372','3373','3374','3375','3376',
    ];

    private int $maxRetries = 3;

    public function handle(): void
    {
        $retryFailed = $this->option('retry-failed');

        if ($retryFailed) {
            $this->info('Mode: Retry - hanya import desa yang belum ada...');
            $this->retryFailed();
            return;
        }

        $this->info('Memulai import data wilayah Jawa Tengah dari wilayah.web.id...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('desa')->truncate();
        DB::table('kecamatan')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $totalKec  = 0;
        $totalDesa = 0;
        $failedKecamatanDesa = [];

        foreach ($this->kabupatenIds as $kabId) {
            $this->line("  → Kabupaten/Kota: {$kabId}");

            try {
                $resp = $this->httpGetWithRetry("https://wilayah.web.id/api/districts/{$kabId}");

                if (!$resp || !$resp->successful()) {
                    $this->warn("    Gagal ambil kecamatan {$kabId}");
                    continue;
                }

                $kecamatanList = $resp->json('data') ?? [];

                if (empty($kecamatanList)) {
                    $this->warn("    Tidak ada data kecamatan untuk {$kabId}");
                    continue;
                }

                $kecBatch = [];

                // 1. Kumpulkan data kecamatan dari API
                foreach ($kecamatanList as $kec) {
                    $kecId   = $kec['code'] ?? $kec['id'] ?? null;
                    $kecNama = $kec['name'] ?? $kec['nama'] ?? '';
                    if (!$kecId) continue;

                    $kecBatch[] = [
                        'id'           => $kecId,
                        'kabupaten_id' => $kabId,
                        'nama'         => $kecNama,
                    ];
                }

                // 2. SIMPAN KECAMATAN DULU KE DATABASE.
                // Ini WAJIB dilakukan sebelum menyimpan desa agar relasi Foreign Key ('kecamatan_id') tidak gagal!
                if (!empty($kecBatch)) {
                    DB::table('kecamatan')->insertOrIgnore($kecBatch);
                    $totalKec += count($kecBatch);
                    $this->info("    ✅ " . count($kecBatch) . " kecamatan ditambahkan");
                }

                // 3. BARU KITA TARIK DAN SIMPAN DATA DESA
                foreach ($kecBatch as $kecLoc) {
                    $kecId = $kecLoc['id'];

                    // Ambil desa per kecamatan
                    try {
                        $respDesa = $this->httpGetWithRetry("https://wilayah.web.id/api/villages/{$kecId}");

                        if ($respDesa && $respDesa->successful()) {
                            $desaList  = $respDesa->json('data') ?? [];
                            $desaBatch = [];
                            foreach ($desaList as $desa) {
                                $desaId   = $desa['code'] ?? $desa['id'] ?? null;
                                $desaNama = $desa['name'] ?? $desa['nama'] ?? '';
                                if (!$desaId) continue;
                                $desaBatch[] = [
                                    'id'           => $desaId,
                                    'kecamatan_id' => $kecId,
                                    'nama'         => $desaNama,
                                ];
                            }
                            if (!empty($desaBatch)) {
                                DB::table('desa')->insertOrIgnore($desaBatch);
                                $totalDesa += count($desaBatch);
                            }
                        } else {
                            $failedKecamatanDesa[] = $kecId;
                            $this->warn("    ⚠️  Gagal desa kecamatan {$kecId} setelah {$this->maxRetries}x retry");
                        }
                    } catch (\Exception $e) {
                        $failedKecamatanDesa[] = $kecId;
                        $this->warn("    ⚠️  Gagal desa kecamatan {$kecId}: " . $e->getMessage());
                    }

                    usleep(300000); // 300ms delay
                }

            } catch (\Exception $e) {
                $this->warn("    Error {$kabId}: " . $e->getMessage());
            }
        }

        $this->info('');
        $this->info('✅ Import selesai!');
        $this->info("   Total kecamatan : {$totalKec}");
        $this->info("   Total desa       : {$totalDesa}");

        if (!empty($failedKecamatanDesa)) {
            $this->warn('');
            $this->warn('⚠️  Kecamatan yang gagal import desa:');
            foreach ($failedKecamatanDesa as $kecId) {
                $this->warn("   - {$kecId}");
            }
            $this->info('');
            $this->info('Jalankan: php artisan wilayah:import --retry-failed');
        }
    }

    /**
     * Retry hanya untuk kecamatan yang belum punya desa di database.
     */
    private function retryFailed(): void
    {
        // Cari kecamatan yang belum punya desa
        $kecamatanTanpaDesa = DB::table('kecamatan')
            ->leftJoin('desa', 'kecamatan.id', '=', 'desa.kecamatan_id')
            ->whereNull('desa.id')
            ->pluck('kecamatan.id', 'kecamatan.nama');

        if ($kecamatanTanpaDesa->isEmpty()) {
            $this->info('✅ Semua kecamatan sudah memiliki data desa!');
            return;
        }

        $this->info("Ditemukan {$kecamatanTanpaDesa->count()} kecamatan tanpa desa:");

        $totalDesa = 0;
        $stillFailed = [];

        foreach ($kecamatanTanpaDesa as $nama => $kecId) {
            $this->line("  → Kecamatan: {$nama} ({$kecId})");

            try {
                $respDesa = $this->httpGetWithRetry("https://wilayah.web.id/api/villages/{$kecId}");

                if ($respDesa && $respDesa->successful()) {
                    $desaList  = $respDesa->json('data') ?? [];
                    $desaBatch = [];
                    foreach ($desaList as $desa) {
                        $desaId   = $desa['code'] ?? $desa['id'] ?? null;
                        $desaNama = $desa['name'] ?? $desa['nama'] ?? '';
                        if (!$desaId) continue;
                        $desaBatch[] = [
                            'id'           => $desaId,
                            'kecamatan_id' => $kecId,
                            'nama'         => $desaNama,
                        ];
                    }
                    if (!empty($desaBatch)) {
                        DB::table('desa')->insertOrIgnore($desaBatch);
                        $totalDesa += count($desaBatch);
                        $this->info("    ✅ " . count($desaBatch) . " desa ditambahkan");
                    } else {
                        $this->warn("    ⚠️  API mengembalikan 0 desa untuk {$kecId}");
                    }
                } else {
                    $stillFailed[] = $kecId;
                    $this->warn("    ❌ Masih gagal setelah {$this->maxRetries}x retry");
                }
            } catch (\Exception $e) {
                $stillFailed[] = $kecId;
                $this->warn("    ❌ Error: " . $e->getMessage());
            }

            usleep(500000); // 500ms delay antar request
        }

        $this->info('');
        $this->info("✅ Retry selesai! {$totalDesa} desa berhasil ditambahkan.");

        if (!empty($stillFailed)) {
            $this->warn('⚠️  Masih gagal: ' . implode(', ', $stillFailed));
            $this->info('   Coba jalankan lagi: php artisan wilayah:import --retry-failed');
        }
    }

    /**
     * HTTP GET dengan retry dan exponential backoff.
     */
    private function httpGetWithRetry(string $url, int $timeout = 30): ?\Illuminate\Http\Client\Response
    {
        for ($attempt = 1; $attempt <= $this->maxRetries; $attempt++) {
            try {
                $response = Http::timeout($timeout)->get($url);

                if ($response->successful()) {
                    return $response;
                }

                if ($attempt < $this->maxRetries) {
                    $delay = $attempt * 2; // 2s, 4s, 6s
                    sleep($delay);
                }
            } catch (\Exception $e) {
                if ($attempt < $this->maxRetries) {
                    $delay = $attempt * 2;
                    $this->line("    ↻ Retry {$attempt}/{$this->maxRetries} setelah {$delay}s...");
                    sleep($delay);
                } else {
                    $this->warn("    ✗ Gagal setelah {$this->maxRetries}x: " . $e->getMessage());
                    return null;
                }
            }
        }

        return null;
    }
}
