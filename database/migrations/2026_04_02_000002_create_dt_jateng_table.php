<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dt_jateng', function (Blueprint $table) {
            $table->id();
            $table->string('kabupaten_id', 10);
            $table->integer('rtlh')->default(0);         // Rumah Tidak Layak Huni
            $table->integer('rtlh_p1')->default(0);      // RTLH Prioritas 1
            $table->integer('rtlh_p2')->default(0);      // RTLH Prioritas 2
            $table->integer('listrik')->default(0);      // Tidak/Kurang Akses Listrik
            $table->integer('air')->default(0);          // Tidak/Kurang Akses Air Bersih
            $table->integer('jamban')->default(0);       // Tidak/Kurang Akses Jamban
            $table->integer('ats')->default(0);          // Anak Tidak Sekolah
            $table->integer('tidak_bekerja')->default(0); // ART Tidak Bekerja
            $table->decimal('pct_art', 5, 2)->default(0); // % ART
            $table->timestamps();

            $table->index('kabupaten_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dt_jateng');
    }
};
