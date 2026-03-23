<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama', 100);
            $table->timestamps();
        });

        Schema::create('kecamatan', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('kabupaten_id', 10);
            $table->string('nama', 100);
            $table->timestamps();

            $table->foreign('kabupaten_id')->references('id')->on('kabupaten')->onDelete('cascade');
        });

        Schema::create('desa', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('kecamatan_id', 10);
            $table->string('nama', 100);
            $table->timestamps();

            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desa');
        Schema::dropIfExists('kecamatan');
        Schema::dropIfExists('kabupaten');
    }
};
