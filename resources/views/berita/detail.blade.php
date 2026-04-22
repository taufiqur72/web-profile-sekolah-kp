@extends('layouts.layouts')


@section('content')
    <div class="max-w-4xl mx-auto px-4 py-12">
        <a href="{{ route('berita.index') }}" class="text-green-700 font-bold text-sm mb-6 inline-block hover:underline">
            ← Kembali ke Berita
        </a>
        <div class="flex items-center gap-4 mb-4">
            <span class="bg-green-100 text-green-700 px-3 py-1 rounded text-xs font-bold uppercase">
                {{ $news->category->name }}
            </span>
            <span class="text-gray-400 text-sm italic">
                {{ \Carbon\Carbon::parse($news->posted_at)->format('d M Y') }}
            </span>
        </div>

        <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-8 leading-tight capitalize">
            {{ str_replace('-', ' ', $news->slug) }}
        </h1>

        <div class="rounded-3xl overflow-hidden shadow-lg mb-10">
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->slug }}" class="w-full object-cover">
        </div>

        <div
            class="prose prose-slate prose-lg max-w-none 
                prose-headings:font-bold prose-headings:text-slate-900 
                prose-p:text-gray-600 prose-p:leading-relaxed 
                prose-img:rounded-2xl">
            {!! $news->news_content !!}
        </div>
    </div>
@endsection
