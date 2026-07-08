@extends('layouts.app')

@section('title', 'Berita Kampus')

@section('content')
{{-- HERO SECTION --}}
<div class="bg-slate-950 text-white pt-24 pb-32 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxyZWN0IHdpZHRoPSI4IiBoZWlnaHQ9IjgiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-20"></div>
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-600 rounded-full blur-[100px] opacity-30"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/50 border border-slate-700 backdrop-blur-md mb-6">
            <span class="text-xl">📰</span>
            <span class="text-sm font-bold text-blue-200 tracking-widest uppercase">Publikasi</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6">Berita Terkini</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-lg leading-relaxed">Kumpulan artikel, liputan acara, dan berita prestasi terbaru dari civitas akademika A Kampus Maju.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-20 pb-24">
    <div class="bg-white rounded-[2.5rem] p-6 sm:p-10 shadow-2xl shadow-slate-200/50 border border-slate-100 min-h-[500px]">
        @if($news && $news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $item)
                <article class="group flex flex-col bg-white rounded-3xl border border-slate-200 hover:border-blue-500 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 overflow-hidden">
                    <div class="relative h-56 overflow-hidden bg-slate-100">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300 text-5xl">🖼️</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1.5 bg-white/90 backdrop-blur-sm text-slate-900 font-bold text-xs rounded-lg shadow-sm">
                                {{ $item->created_at?->format('d M Y') ?? '-' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="flex-1 p-6 sm:p-8 flex flex-col">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Berita</span>
                        </div>
                        
                        <h2 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors mb-4 line-clamp-2">
                            {{ $item->title }}
                        </h2>
                        
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3 flex-1">
                            {{ strip_tags($item->content) }}
                        </p>
                        
                        <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                            <div class="flex items-center gap-2 text-xs font-medium text-slate-500">
                                <div class="w-6 h-6 rounded-full bg-slate-200 flex items-center justify-center">👤</div>
                                {{ $item->user?->name ?? 'Admin' }}
                            </div>
                            <span class="text-blue-600 font-bold text-sm group-hover:translate-x-1 transition-transform">Baca &rarr;</span>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-16 flex justify-center">
                {{ $news->links() }}
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-full py-24 text-center">
                <div class="w-24 h-24 rounded-full bg-slate-50 flex items-center justify-center text-5xl mb-6 shadow-inner">
                    🗞️
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Belum Ada Berita</h3>
                <p class="text-slate-500 text-lg max-w-md">Kumpulan berita dan artikel terbaru kampus belum tersedia saat ini.</p>
            </div>
        @endif
    </div>
</div>
@endsection
