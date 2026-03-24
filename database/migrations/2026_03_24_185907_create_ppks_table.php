<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppks', function (Blueprint $table) {
            $table->id();
            $table->integer('kabupaten_id')->nullable(); // samain sama tabel kabupaten
            $table->string('jenis_ppks');
            $table->year('tahun');
            $table->integer('jumlah')->default(0);
            $table->timestamps();

            // ❌ sementara NONAKTIFIN dulu foreign key biar ga error
            // nanti bisa dipasang lagi kalau tipe sudah dipastikan sama 100%

            $table->index(['kabupaten_id', 'tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppks');
    }
};