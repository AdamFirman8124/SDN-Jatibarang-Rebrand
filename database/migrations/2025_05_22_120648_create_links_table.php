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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('link');
            $table->unsignedBigInteger('videos_id')->nullable();
            $table->unsignedBigInteger('lombas_id')->nullable();
            $table->unsignedBigInteger('kegiatans_id')->nullable();
            $table->timestamps();

            $table->foreign('videos_id')
                ->references('id')
                ->on('videos')
                ->onUpdate('cascade')
                ->onDelete(null);
            $table->foreign('lombas_id')
                ->references('id')
                ->on('lombas')
                ->onUpdate('cascade')
                ->onDelete(null);
            $table->foreign('kegiatans_id')
                ->references('id')
                ->on('kegiatans')
                ->onUpdate('cascade')
                ->onDelete(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
