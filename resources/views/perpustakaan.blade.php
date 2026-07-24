@extends('layouts.app')

@section('title', 'Perpustakaan Digital Cendekia')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Perpustakaan Digital Cendekia</h1>
        <p class="mt-4 text-lg text-slate-600">Jelajahi koleksi buku yang tersedia di perpustakaan kami.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse ($books as $book)
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow group flex flex-col h-full">
                <div class="relative aspect-[3/4] bg-slate-100 overflow-hidden">
                    @if ($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="flex items-center justify-center w-full h-full bg-slate-200 text-slate-400">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                    @endif
                    
                    <div class="absolute top-3 right-3">
                        @if ($book->stock > 0)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 shadow-sm backdrop-blur-sm bg-green-100/90">
                                Tersedia
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 shadow-sm backdrop-blur-sm bg-red-100/90">
                                Habis
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="p-5 flex flex-col flex-grow">
                    <div class="text-xs font-semibold text-blue-600 mb-2">{{ $book->category }}</div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1 line-clamp-2">{{ $book->title }}</h3>
                    <p class="text-sm text-slate-500 mb-4">{{ $book->author }} &bull; {{ $book->publication_year }}</p>
                    
                    <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-sm text-slate-600 font-medium">Stok: {{ $book->stock }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-slate-500">Belum ada buku yang tersedia di perpustakaan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
