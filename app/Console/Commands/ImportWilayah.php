<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ImportWilayah extends Command
{
    protected $signature   = 'wilayah:import';
    protected $description = 'Import data kecamatan & desa Jawa Tengah dari API wilayah.web.id';

    // Kode semua kabupaten/kota Jawa Tengah
    private array $kabupatenIds = [
        '3301','3302','3303','3304','3305','3306','3307','3308','3309','3310',
        '3311','3312','3313','3314','3315','3316','3317','3318','3319','3320',
        '3321','3322','3323','3324','3325','3326','3327','3328','3329',
        '3371','3372','3373','3374','3375','3376',
    ];

    public function handle(): void
    {
        $this->info('Memulai import data wilayah Jawa Tengah dari wilayah.web.id...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('desa')->truncate();
        DB::table('kecamatan')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $totalKec  = 0;
        $totalDesa = 0;

        foreach ($this->kabupatenIds as $kabId) {
            $this->line("  → Kabupaten/Kota: {$kabId}");

            try {
                $resp = Http::timeout(15)
                    ->get("https://wilayah.web.id/api/districts/{$kabId}");

                if (!$resp->successful()) {
                    $this->warn("    Gagal ambil kecamatan {$kabId} (HTTP {$resp->status()})");
                    continue;
                }

                $kecamatanList = $resp->json('data') ?? [];

                if (empty($kecamatanList)) {
                    $this->warn("    Tidak ada data kecamatan untuk {$kabId}");
                    continue;
                }

                $kecBatch = [];

                foreach ($kecamatanList as $kec) {
                    $kecId   = $kec['code'] ?? $kec['id'] ?? null;
                    $kecNama = $kec['name'] ?? $kec['nama'] ?? '';
                    if (!$kecId) continue;

                    $kecBatch[] = [
                        'id'           => $kecId,
                        'kabupaten_id' => $kabId,
                        'nama'         => $kecNama,
                    ];

                    // Ambil desa per kecamatan
                    try {
                        $respDesa = Http::timeout(15)
                            ->get("https://wilayah.web.id/api/villages/{$kecId}");

                        if ($respDesa->successful()) {
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
                        }
                    } catch (\Exception $e) {
                        $this->warn("    Gagal desa kecamatan {$kecId}: " . $e->getMessage());
                    }

                    usleep(200000); // 200ms delay
                }

                if (!empty($kecBatch)) {
                    DB::table('kecamatan')->insertOrIgnore($kecBatch);
                    $totalKec += count($kecBatch);
                    $this->info("    ✅ " . count($kecBatch) . " kecamatan ditambahkan");
                }

            } catch (\Exception $e) {
                $this->warn("    Error {$kabId}: " . $e->getMessage());
            }
        }

        $this->info('');
        $this->info('✅ Import selesai!');
        $this->info("   Total kecamatan : {$totalKec}");
        $this->info("   Total desa       : {$totalDesa}");
    }
}
