<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('lokasi');
            $table->string('penanggung_jawab');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('lombas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('lokasi');
            $table->string('penyelenggara');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lombas');
        Schema::dropIfExists('kegiatans');
    }
};
