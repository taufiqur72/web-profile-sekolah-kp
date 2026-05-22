<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumnis';
    protected $fillable = ['nama_angkatan', 'thumbnail_photos'];

    // Relasi ke galeri
    public function galleries()
    {
        return $this->hasMany(AlumniGalery::class, 'alumnis_id');
    }
}