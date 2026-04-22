@extends('layouts.layouts')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    {{-- Bagian Header --}}
    <div class="flex justify-between items-end mb-8 border-b-2 border-gray-100 pb-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-800">Berita Terkini</h2>
            <div class="h-1 w-12 bg-green-600 mt-2"></div>
        </div>
        {{-- Link Lihat Semua diarahkan ke index berita --}}
        <a href="{{ route('berita.index') }}" class="text-green-700 font-bold flex items-center hover:underline">
            Lihat Semua Berita <span class="ml-2">→</span>
        </a>
    </div>

    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @forelse($allNews as $news)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-full">
                {{-- Gambar --}}
                <div class="relative h-56">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->slug }}" class="w-full h-full object-cover">
                </div>
                
                <div class="p-6 flex flex-col flex-grow">
                    {{-- Badge Kategori --}}
                    <div class="mb-3">
                        <span class="px-4 py-1 rounded-lg text-xs font-bold uppercase tracking-wider text-white 
                            {{ $news->category->name == 'Kegiatan' ? 'bg-green-500' : '' }}
                            {{ $news->category->name == 'Prestasi' ? 'bg-blue-500' : '' }}
                            {{ $news->category->name == 'Pengumuman' ? 'bg-amber-500' : 'bg-slate-500' }}">
                            {{ $news->category->name }}
                        </span>
                    </div>

                    {{-- Judul --}}
                    <h3 class="text-xl font-extrabold text-slate-900 mb-3 leading-tight capitalize">
                        {{ str_replace('-', ' ', $news->slug) }}
                    </h3>

                    {{-- Ringkasan --}}
                    <p class="text-gray-500 text-sm line-clamp-3 mb-6 flex-grow">
                        {{ strip_tags($news->news_content) }}
                    </p>

                    {{-- Tombol Baca Selengkapnya: Update route ke 'berita.detail' --}}
                    <a href="{{ route('berita.detail', $news->slug) }}" class="text-green-700 font-black text-xs tracking-widest uppercase hover:text-green-800 transition-colors">
                        BACA SELENGKAPNYA
                    </a>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500 py-10">Belum ada berita yang diterbitkan.</p>
        @endforelse
    </div>

    {{-- Navigasi Halaman --}}
    <div class="mt-12">
        {{ $allNews->links() }}
    </div>
</div>
@endsection