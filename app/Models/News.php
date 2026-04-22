<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class News extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id',
        'slug',
        'news_content',
        'image',
        'posted_at',
    ];

    // Relasi ke Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
