<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('desa')->truncate();
        DB::table('kecamatan')->truncate();
        DB::table('kabupaten')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // =============================================
        // DATA KABUPATEN/KOTA JAWA TENGAH
        // =============================================
        $kabupaten = [
            ['id' => '3301', 'nama' => 'Kabupaten Cilacap'],
            ['id' => '3302', 'nama' => 'Kabupaten Banyumas'],
            ['id' => '3303', 'nama' => 'Kabupaten Purbalingga'],
            ['id' => '3304', 'nama' => 'Kabupaten Banjarnegara'],
            ['id' => '3305', 'nama' => 'Kabupaten Kebumen'],
            ['id' => '3306', 'nama' => 'Kabupaten Purworejo'],
            ['id' => '3307', 'nama' => 'Kabupaten Wonosobo'],
            ['id' => '3308', 'nama' => 'Kabupaten Magelang'],
            ['id' => '3309', 'nama' => 'Kabupaten Boyolali'],
            ['id' => '3310', 'nama' => 'Kabupaten Klaten'],
            ['id' => '3311', 'nama' => 'Kabupaten Sukoharjo'],
            ['id' => '3312', 'nama' => 'Kabupaten Wonogiri'],
            ['id' => '3313', 'nama' => 'Kabupaten Karanganyar'],
            ['id' => '3314', 'nama' => 'Kabupaten Sragen'],
            ['id' => '3315', 'nama' => 'Kabupaten Grobogan'],
            ['id' => '3316', 'nama' => 'Kabupaten Blora'],
            ['id' => '3317', 'nama' => 'Kabupaten Rembang'],
            ['id' => '3318', 'nama' => 'Kabupaten Pati'],
            ['id' => '3319', 'nama' => 'Kabupaten Kudus'],
            ['id' => '3320', 'nama' => 'Kabupaten Jepara'],
            ['id' => '3321', 'nama' => 'Kabupaten Demak'],
            ['id' => '3322', 'nama' => 'Kabupaten Semarang'],
            ['id' => '3323', 'nama' => 'Kabupaten Temanggung'],
            ['id' => '3324', 'nama' => 'Kabupaten Kendal'],
            ['id' => '3325', 'nama' => 'Kabupaten Batang'],
            ['id' => '3326', 'nama' => 'Kabupaten Pekalongan'],
            ['id' => '3327', 'nama' => 'Kabupaten Pemalang'],
            ['id' => '3328', 'nama' => 'Kabupaten Tegal'],
            ['id' => '3329', 'nama' => 'Kabupaten Brebes'],
            ['id' => '3371', 'nama' => 'Kota Magelang'],
            ['id' => '3372', 'nama' => 'Kota Surakarta'],
            ['id' => '3373', 'nama' => 'Kota Salatiga'],
            ['id' => '3374', 'nama' => 'Kota Semarang'],
            ['id' => '3375', 'nama' => 'Kota Pekalongan'],
            ['id' => '3376', 'nama' => 'Kota Tegal'],
        ];

        DB::table('kabupaten')->insert($kabupaten);

        // =============================================
        // DATA KECAMATAN (contoh lengkap untuk beberapa kabupaten)
        // Untuk data lengkap semua kecamatan, gunakan package
        // "laravolt/indonesia" atau import dari file SQL BPS
        // =============================================
        $kecamatan = [
            // Kota Semarang (3374)
            ['id' => '3374010', 'kabupaten_id' => '3374', 'nama' => 'Mijen'],
            ['id' => '3374020', 'kabupaten_id' => '3374', 'nama' => 'Gunungpati'],
            ['id' => '3374030', 'kabupaten_id' => '3374', 'nama' => 'Banyumanik'],
            ['id' => '3374040', 'kabupaten_id' => '3374', 'nama' => 'Gajah Mungkur'],
            ['id' => '3374050', 'kabupaten_id' => '3374', 'nama' => 'Semarang Selatan'],
            ['id' => '3374060', 'kabupaten_id' => '3374', 'nama' => 'Candisari'],
            ['id' => '3374070', 'kabupaten_id' => '3374', 'nama' => 'Tembalang'],
            ['id' => '3374080', 'kabupaten_id' => '3374', 'nama' => 'Pedurungan'],
            ['id' => '3374090', 'kabupaten_id' => '3374', 'nama' => 'Genuk'],
            ['id' => '3374100', 'kabupaten_id' => '3374', 'nama' => 'Gayamsari'],
            ['id' => '3374110', 'kabupaten_id' => '3374', 'nama' => 'Semarang Timur'],
            ['id' => '3374120', 'kabupaten_id' => '3374', 'nama' => 'Semarang Utara'],
            ['id' => '3374130', 'kabupaten_id' => '3374', 'nama' => 'Semarang Tengah'],
            ['id' => '3374140', 'kabupaten_id' => '3374', 'nama' => 'Semarang Barat'],
            ['id' => '3374150', 'kabupaten_id' => '3374', 'nama' => 'Tugu'],
            ['id' => '3374160', 'kabupaten_id' => '3374', 'nama' => 'Ngaliyan'],

            // Kabupaten Cilacap (3301)
            ['id' => '3301010', 'kabupaten_id' => '3301', 'nama' => 'Dayeuhluhur'],
            ['id' => '3301020', 'kabupaten_id' => '3301', 'nama' => 'Wanareja'],
            ['id' => '3301030', 'kabupaten_id' => '3301', 'nama' => 'Majenang'],
            ['id' => '3301040', 'kabupaten_id' => '3301', 'nama' => 'Cimanggu'],
            ['id' => '3301050', 'kabupaten_id' => '3301', 'nama' => 'Karangpucung'],
            ['id' => '3301060', 'kabupaten_id' => '3301', 'nama' => 'Cipari'],
            ['id' => '3301070', 'kabupaten_id' => '3301', 'nama' => 'Sidareja'],
            ['id' => '3301080', 'kabupaten_id' => '3301', 'nama' => 'Kedungreja'],
            ['id' => '3301090', 'kabupaten_id' => '3301', 'nama' => 'Patimuan'],
            ['id' => '3301100', 'kabupaten_id' => '3301', 'nama' => 'Gandrungmangu'],
            ['id' => '3301110', 'kabupaten_id' => '3301', 'nama' => 'Bantarsari'],
            ['id' => '3301120', 'kabupaten_id' => '3301', 'nama' => 'Kawunganten'],
            ['id' => '3301130', 'kabupaten_id' => '3301', 'nama' => 'Kampung Laut'],
            ['id' => '3301140', 'kabupaten_id' => '3301', 'nama' => 'Jeruklegi'],
            ['id' => '3301150', 'kabupaten_id' => '3301', 'nama' => 'Kesugihan'],
            ['id' => '3301160', 'kabupaten_id' => '3301', 'nama' => 'Adipala'],
            ['id' => '3301170', 'kabupaten_id' => '3301', 'nama' => 'Maos'],
            ['id' => '3301180', 'kabupaten_id' => '3301', 'nama' => 'Sampang'],
            ['id' => '3301190', 'kabupaten_id' => '3301', 'nama' => 'Kroya'],
            ['id' => '3301200', 'kabupaten_id' => '3301', 'nama' => 'Binangun'],
            ['id' => '3301210', 'kabupaten_id' => '3301', 'nama' => 'Nusawungu'],
            ['id' => '3301220', 'kabupaten_id' => '3301', 'nama' => 'Cilacap Selatan'],
            ['id' => '3301230', 'kabupaten_id' => '3301', 'nama' => 'Cilacap Tengah'],
            ['id' => '3301240', 'kabupaten_id' => '3301', 'nama' => 'Cilacap Utara'],

            // Kabupaten Banyumas (3302)
            ['id' => '3302010', 'kabupaten_id' => '3302', 'nama' => 'Lumbir'],
            ['id' => '3302020', 'kabupaten_id' => '3302', 'nama' => 'Wangon'],
            ['id' => '3302030', 'kabupaten_id' => '3302', 'nama' => 'Jatilawang'],
            ['id' => '3302040', 'kabupaten_id' => '3302', 'nama' => 'Rawalo'],
            ['id' => '3302050', 'kabupaten_id' => '3302', 'nama' => 'Kebasen'],
            ['id' => '3302060', 'kabupaten_id' => '3302', 'nama' => 'Kemranjen'],
            ['id' => '3302070', 'kabupaten_id' => '3302', 'nama' => 'Sumpiuh'],
            ['id' => '3302080', 'kabupaten_id' => '3302', 'nama' => 'Tambak'],
            ['id' => '3302090', 'kabupaten_id' => '3302', 'nama' => 'Somagede'],
            ['id' => '3302100', 'kabupaten_id' => '3302', 'nama' => 'Kalibagor'],
            ['id' => '3302110', 'kabupaten_id' => '3302', 'nama' => 'Banyumas'],
            ['id' => '3302120', 'kabupaten_id' => '3302', 'nama' => 'Patikraja'],
            ['id' => '3302130', 'kabupaten_id' => '3302', 'nama' => 'Purwojati'],
            ['id' => '3302140', 'kabupaten_id' => '3302', 'nama' => 'Ajibarang'],
            ['id' => '3302150', 'kabupaten_id' => '3302', 'nama' => 'Gumelar'],
            ['id' => '3302160', 'kabupaten_id' => '3302', 'nama' => 'Pekuncen'],
            ['id' => '3302170', 'kabupaten_id' => '3302', 'nama' => 'Cilongok'],
            ['id' => '3302180', 'kabupaten_id' => '3302', 'nama' => 'Karanglewas'],
            ['id' => '3302190', 'kabupaten_id' => '3302', 'nama' => 'Kedungbanteng'],
            ['id' => '3302200', 'kabupaten_id' => '3302', 'nama' => 'Baturraden'],
            ['id' => '3302210', 'kabupaten_id' => '3302', 'nama' => 'Sumbang'],
            ['id' => '3302220', 'kabupaten_id' => '3302', 'nama' => 'Kembaran'],
            ['id' => '3302230', 'kabupaten_id' => '3302', 'nama' => 'Sokaraja'],
            ['id' => '3302240', 'kabupaten_id' => '3302', 'nama' => 'Purwokerto Selatan'],
            ['id' => '3302250', 'kabupaten_id' => '3302', 'nama' => 'Purwokerto Barat'],
            ['id' => '3302260', 'kabupaten_id' => '3302', 'nama' => 'Purwokerto Timur'],
            ['id' => '3302270', 'kabupaten_id' => '3302', 'nama' => 'Purwokerto Utara'],

            // Kota Surakarta (3372)
            ['id' => '3372010', 'kabupaten_id' => '3372', 'nama' => 'Laweyan'],
            ['id' => '3372020', 'kabupaten_id' => '3372', 'nama' => 'Serengan'],
            ['id' => '3372030', 'kabupaten_id' => '3372', 'nama' => 'Pasar Kliwon'],
            ['id' => '3372040', 'kabupaten_id' => '3372', 'nama' => 'Jebres'],
            ['id' => '3372050', 'kabupaten_id' => '3372', 'nama' => 'Banjarsari'],

            // Kabupaten Klaten (3310)
            ['id' => '3310010', 'kabupaten_id' => '3310', 'nama' => 'Prambanan'],
            ['id' => '3310020', 'kabupaten_id' => '3310', 'nama' => 'Gantiwarno'],
            ['id' => '3310030', 'kabupaten_id' => '3310', 'nama' => 'Wedi'],
            ['id' => '3310040', 'kabupaten_id' => '3310', 'nama' => 'Bayat'],
            ['id' => '3310050', 'kabupaten_id' => '3310', 'nama' => 'Cawas'],
            ['id' => '3310060', 'kabupaten_id' => '3310', 'nama' => 'Trucuk'],
            ['id' => '3310070', 'kabupaten_id' => '3310', 'nama' => 'Kalikotes'],
            ['id' => '3310080', 'kabupaten_id' => '3310', 'nama' => 'Kebonarum'],
            ['id' => '3310090', 'kabupaten_id' => '3310', 'nama' => 'Jogonalan'],
            ['id' => '3310100', 'kabupaten_id' => '3310', 'nama' => 'Manisrenggo'],
            ['id' => '3310110', 'kabupaten_id' => '3310', 'nama' => 'Karangnongko'],
            ['id' => '3310120', 'kabupaten_id' => '3310', 'nama' => 'Ngawen'],
            ['id' => '3310130', 'kabupaten_id' => '3310', 'nama' => 'Ceper'],
            ['id' => '3310140', 'kabupaten_id' => '3310', 'nama' => 'Pedan'],
            ['id' => '3310150', 'kabupaten_id' => '3310', 'nama' => 'Karangdowo'],
            ['id' => '3310160', 'kabupaten_id' => '3310', 'nama' => 'Juwiring'],
            ['id' => '3310170', 'kabupaten_id' => '3310', 'nama' => 'Wonosari'],
            ['id' => '3310180', 'kabupaten_id' => '3310', 'nama' => 'Delanggu'],
            ['id' => '3310190', 'kabupaten_id' => '3310', 'nama' => 'Polanharjo'],
            ['id' => '3310200', 'kabupaten_id' => '3310', 'nama' => 'Karanganom'],
            ['id' => '3310210', 'kabupaten_id' => '3310', 'nama' => 'Tulung'],
            ['id' => '3310220', 'kabupaten_id' => '3310', 'nama' => 'Jatinom'],
            ['id' => '3310230', 'kabupaten_id' => '3310', 'nama' => 'Kemalang'],
            ['id' => '3310240', 'kabupaten_id' => '3310', 'nama' => 'Klaten Selatan'],
            ['id' => '3310250', 'kabupaten_id' => '3310', 'nama' => 'Klaten Tengah'],
            ['id' => '3310260', 'kabupaten_id' => '3310', 'nama' => 'Klaten Utara'],
        ];

        DB::table('kecamatan')->insert($kecamatan);

        // =============================================
        // DATA DESA (contoh untuk Semarang Selatan)
        // =============================================
        $desa = [
            // Semarang Selatan (3374050)
            ['id' => '3374050001', 'kecamatan_id' => '3374050', 'nama' => 'Wonodri'],
            ['id' => '3374050002', 'kecamatan_id' => '3374050', 'nama' => 'Peterongan'],
            ['id' => '3374050003', 'kecamatan_id' => '3374050', 'nama' => 'Randusari'],
            ['id' => '3374050004', 'kecamatan_id' => '3374050', 'nama' => 'Bulustalan'],
            ['id' => '3374050005', 'kecamatan_id' => '3374050', 'nama' => 'Barusari'],
            ['id' => '3374050006', 'kecamatan_id' => '3374050', 'nama' => 'Mugassari'],
            ['id' => '3374050007', 'kecamatan_id' => '3374050', 'nama' => 'Pleburan'],
            ['id' => '3374050008', 'kecamatan_id' => '3374050', 'nama' => 'Lamper Lor'],
            ['id' => '3374050009', 'kecamatan_id' => '3374050', 'nama' => 'Lamper Tengah'],
            ['id' => '3374050010', 'kecamatan_id' => '3374050', 'nama' => 'Lamper Kidul'],

            // Banyumanik (3374030)
            ['id' => '3374030001', 'kecamatan_id' => '3374030', 'nama' => 'Banyumanik'],
            ['id' => '3374030002', 'kecamatan_id' => '3374030', 'nama' => 'Gedawang'],
            ['id' => '3374030003', 'kecamatan_id' => '3374030', 'nama' => 'Jabungan'],
            ['id' => '3374030004', 'kecamatan_id' => '3374030', 'nama' => 'Pudakpayung'],
            ['id' => '3374030005', 'kecamatan_id' => '3374030', 'nama' => 'Ngesrep'],
            ['id' => '3374030006', 'kecamatan_id' => '3374030', 'nama' => 'Tinjomoyo'],
            ['id' => '3374030007', 'kecamatan_id' => '3374030', 'nama' => 'Sumurboto'],
            ['id' => '3374030008', 'kecamatan_id' => '3374030', 'nama' => 'Srondol Wetan'],
            ['id' => '3374030009', 'kecamatan_id' => '3374030', 'nama' => 'Srondol Kulon'],
            ['id' => '3374030010', 'kecamatan_id' => '3374030', 'nama' => 'Padangsari'],
            ['id' => '3374030011', 'kecamatan_id' => '3374030', 'nama' => 'Pedalangan'],

            // Tembalang (3374070)
            ['id' => '3374070001', 'kecamatan_id' => '3374070', 'nama' => 'Tembalang'],
            ['id' => '3374070002', 'kecamatan_id' => '3374070', 'nama' => 'Bulusan'],
            ['id' => '3374070003', 'kecamatan_id' => '3374070', 'nama' => 'Mangunharjo'],
            ['id' => '3374070004', 'kecamatan_id' => '3374070', 'nama' => 'Meteseh'],
            ['id' => '3374070005', 'kecamatan_id' => '3374070', 'nama' => 'Rowosari'],
            ['id' => '3374070006', 'kecamatan_id' => '3374070', 'nama' => 'Sambiroto'],
            ['id' => '3374070007', 'kecamatan_id' => '3374070', 'nama' => 'Kedungmundu'],
            ['id' => '3374070008', 'kecamatan_id' => '3374070', 'nama' => 'Tandang'],
            ['id' => '3374070009', 'kecamatan_id' => '3374070', 'nama' => 'Jangli'],
            ['id' => '3374070010', 'kecamatan_id' => '3374070', 'nama' => 'Sendangmulyo'],
            ['id' => '3374070011', 'kecamatan_id' => '3374070', 'nama' => 'Sendangguwo'],
            ['id' => '3374070012', 'kecamatan_id' => '3374070', 'nama' => 'Kramas'],
        ];

        DB::table('desa')->insert($desa);

        $this->command->info('✅ Data wilayah Jawa Tengah berhasil di-seed!');
        $this->command->warn('⚠️  Data kecamatan & desa baru mencakup beberapa wilayah contoh.');
        $this->command->warn('   Untuk data lengkap, jalankan: php artisan wilayah:import');
    }
}
