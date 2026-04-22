<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    // Menampilkan daftar semua berita
    public function index()
    {
        $allNews = News::with('category')
            ->orderBy('posted_at', 'desc')
            ->paginate(9);

        // Mengarah ke folder 'berita' file 'index.blade.php'
        return view('berita.index', compact('allNews'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->with('category')->firstOrFail();

        $relatedNews = News::where('slug', '!=', $slug)
            ->limit(3)
            ->get();

        // Mengarah ke folder 'berita' file 'detail.blade.php'
        return view('berita.detail', compact('news', 'relatedNews'));
    }
}
