<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category; // Tambahkan ini

class NewsController extends Controller
{
    public function index()
    {
        // Mengambil semua kategori untuk filter
        $categories = Category::all();

        // Mengambil berita dengan filter opsional berdasarkan kategori
        $allNews = News::with('category')
            ->when(request('category'), function($query) {
                $query->whereHas('category', function($q) {
                    $q->where('name', request('category'));
                });
            })
            ->orderBy('posted_at', 'desc')
            ->paginate(9);

        return view('berita.index', compact('allNews', 'categories'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->with('category')->firstOrFail();
        $relatedNews = News::where('slug', '!=', $slug)
            ->limit(3)
            ->get();

        return view('berita.detail', compact('news', 'relatedNews'));
    }
}