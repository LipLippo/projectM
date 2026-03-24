<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PpksSeeder extends Seeder
{
    public function run(): void
    {
        $jenisList = [
            'Anak Balita Terlantar (ABT)',
            'Anak Terlantar (AT)',
            'Anak yang Mengalami Masalah Hukum (AMH)',
            'Anak Jalanan (AJ)',
            'Anak Dengan Kedisabilitasan',
            'Anak yang menjadi korban Tindak kekerasan',
            'Anak yang Memerlukan Perlindungan Khusus',
            'Lanjut Usia Terlantar',
            'Penyandang Disabilitas',
            'Tuna Susila (TS)',
        ];

        $tahunList   = [2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025];
        $kabupatenIds = DB::table('kabupaten')->pluck('id')->toArray();

        if (empty($kabupatenIds)) {
            // Jika tabel kabupaten kosong, pakai null
            $kabupatenIds = [null];
        }

        $rows = [];
        foreach ($jenisList as $jenis) {
            foreach ($tahunList as $tahun) {
                foreach ($kabupatenIds as $kabId) {
                    $rows[] = [
                        'kabupaten_id' => $kabId,
                        'jenis_ppks'   => $jenis,
                        'tahun'        => $tahun,
                        'jumlah'       => rand(100, 200000),
                        'created_at'   => now(),
                        'updated_at'   => now(),
                    ];
                }
            }
        }

        // Insert batch 500
        foreach (array_chunk($rows, 500) as $chunk) {
            DB::table('ppks')->insert($chunk);
        }
    }
}