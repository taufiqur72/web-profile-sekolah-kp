<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPendaftaran extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika nama model tidak sesuai standar (jamak)
    protected $table = 'form_pendaftaran';

    // Menentukan kolom mana saja yang bisa diisi (mass assignable)
    protected $fillable = [
        'link_pendaftaran',
        'is_active',
        'pesan_tutup',
        'tahun_ajaran',
    ];

    // Opsional: Jika Anda ingin is_active otomatis menjadi boolean (true/false)
    protected $casts = [
        'is_active' => 'boolean',
    ];
}