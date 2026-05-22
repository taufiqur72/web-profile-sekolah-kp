<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumniGalery extends Model
{
    protected $table = 'alumnis_galery';
    protected $fillable = ['alumnis_id', 'image_galery', 'caption'];

    protected $casts = [
    'image_galery' => 'array',
];

    // Relasi ke alumni
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumnis_id');
    }
}
