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
        Schema::create('school_profile', function (Blueprint $table) {
            $table->id();
            // Kepala Sekolah
            $table->string('nama_kepsek')->nullable();
            $table->string('label')->nullable();
            $table->string('foto_profil')->nullable();
 
            // Sambutan
            $table->longText('konten_sambutan')->nullable();
            $table->longText('konten_sejarah')->nullable();
             $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_profile');
    }
};
