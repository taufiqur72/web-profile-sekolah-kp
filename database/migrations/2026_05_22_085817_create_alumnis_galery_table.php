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
    Schema::create('alumnis_galery', function (Blueprint $table) {
        $table->id();
        
        // Memperbaiki typo: dikunci ke tabel 'alumnis' (Pakai U, bukan I)
        $table->foreignId('alumnis_id')
              ->constrained('alumnis') 
              ->onDelete('cascade');
        
        $table->string('image_galery');
        $table->string('caption')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis_galery');
    }
};
