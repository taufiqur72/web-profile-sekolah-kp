<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\News;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Relasi ke News
    public function news(): HasMany
    {
        // Laravel akan mencari 'category_id' di tabel news secara otomatis
        return $this->hasMany(News::class);
    }
}
