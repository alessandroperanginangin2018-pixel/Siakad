@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Website resmi A Kampus Maju — informasi profil, dosen, fasilitas, pengumuman, dan berita kampus.')

@section('content')
@php
    $aboutImages = [];
    if ($aboutme && $aboutme->image) {
        $aboutImages = is_array($aboutme->image)
            ? $aboutme->image
            : (json_decode($aboutme->image, true) ?: []);
    }

    $heroImage = $aboutImages[0] ?? null;
@endphp

{{-- HERO SECTION --}}
<section class="relative overflow-hidden bg-slate-950 text-white min-h-[90vh] flex items-center">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute -top-32 -right-32 h-96 w-96 rounded-full bg-blue-600 blur-[128px]"></div>
        <div class="absolute bottom-0 left-10 h-72 w-72 rounded-full bg-blue-800 blur-[100px]"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxyZWN0IHdpZHRoPSI4IiBoZWlnaHQ9IjgiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-20"></div>
    </div>

    <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div class="z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-800/50 border border-slate-700 backdrop-blur-md mb-6">
                <span class="flex h-2 w-2 rounded-full bg-blue-500"></span>
                <span class="text-xs font-semibold text-blue-200 tracking-wider uppercase">Portal Akademik Terpadu</span>
            </div>

            <h1 class="text-5xl font-extrabold tracking-tight sm:text-6xl lg:text-7xl leading-tight">
                Membangun <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Generasi Unggul</span> Masa Depan
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-300">
                {{ \Illuminate\Support\Str::limit(strip_tags($aboutme->content ?? 'A Kampus Maju adalah institusi pendidikan tinggi yang berkomitmen menghasilkan lulusan unggul, adaptif, dan siap menghadapi perkembangan teknologi.'), 190) }}
            </p>

            <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                <a href="{{ route('profile') }}"
                   class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-8 py-4 text-sm font-bold text-white shadow-lg shadow-blue-600/20 hover:bg-blue-500 transition-all hover:-translate-y-0.5">
                    Mulai Eksplorasi
                </a>

                <a href="{{ route('lectures') }}"
                   class="inline-flex items-center justify-center rounded-lg border border-slate-700 bg-slate-800/50 px-8 py-4 text-sm font-bold text-white backdrop-blur-sm transition-all hover:bg-slate-800 hover:border-slate-600">
                    Direktori Dosen
                </a>
            </div>

            <div class="mt-12 grid grid-cols-3 gap-6 pt-8 border-t border-slate-800/60">
                <div>
                    <p class="text-4xl font-black text-white">{{ $facilities->count() }}<span class="text-blue-500">+</span></p>
                    <p class="mt-1 text-sm font-medium text-slate-400">Fasilitas Modern</p>
                </div>
                <div>
                    <p class="text-4xl font-black text-white">{{ $cooperations->count() }}<span class="text-blue-500">+</span></p>
                    <p class="mt-1 text-sm font-medium text-slate-400">Mitra Global</p>
                </div>
                <div>
                    <p class="text-4xl font-black text-white">{{ $rektors->count() }}</p>
                    <p class="mt-1 text-sm font-medium text-slate-400">Pimpinan</p>
                </div>
            </div>
        </div>

        <div class="relative hidden lg:block z-10">
            @if($heroImage)
                <img src="{{ asset('storage/' . $heroImage) }}"
                     alt="A Kampus Maju"
                     class="w-full h-[600px] rounded-[2rem] object-cover shadow-2xl ring-1 ring-white/10">
            @else
                <div class="w-full h-[600px] rounded-[2rem] bg-gradient-to-tr from-slate-900 to-slate-800 flex items-center justify-center shadow-2xl ring-1 ring-white/10 relative overflow-hidden">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxyZWN0IHdpZHRoPSI4IiBoZWlnaHQ9IjgiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-30"></div>
                    <div class="text-center relative z-10">
                        <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-2xl bg-blue-600/20 text-blue-400 text-4xl font-black mb-6 border border-blue-500/30">
                            AK
                        </div>
                        <p class="text-slate-400 font-medium tracking-wide uppercase text-sm">Visual Kampus</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- LOGO KERJA SAMA --}}
<section class="bg-white py-16 border-b border-slate-200">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-8">Dipercaya Oleh Mitra Institusi Global</p>
        
        @if($cooperations->count())
            <div class="flex flex-wrap justify-center gap-8 md:gap-16 opacity-60 hover:opacity-100 transition-opacity duration-500">
                @foreach($cooperations as $cooperation)
                    <img src="{{ asset('storage/' . $cooperation->image) }}"
                         alt="Logo kerja sama"
                         class="max-h-12 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300">
                @endforeach
            </div>
        @else
            <div class="text-slate-400 text-sm">Data kemitraan sedang diperbarui.</div>
        @endif
    </div>
</section>

{{-- PROFIL SINGKAT & SAMBUTAN --}}
<section class="bg-slate-50 py-24">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div class="bg-white rounded-[2rem] p-10 sm:p-14 shadow-sm border border-slate-100 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full -z-0 transition-transform group-hover:scale-110"></div>
            <div class="relative z-10">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-blue-600 text-white mb-6 shadow-lg shadow-blue-600/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Tentang A Kampus Maju</h2>
                <p class="mt-6 leading-relaxed text-slate-600 text-lg">
                    {{ $aboutme->content ?? 'Profil singkat universitas belum tersedia. Silakan lengkapi data melalui CMS.' }}
                </p>
                <div class="mt-8">
                    <a href="{{ route('profile') }}" class="inline-flex items-center font-bold text-blue-600 hover:text-blue-700 transition-colors group-hover:gap-2">
                        Pelajari Selengkapnya <span class="transition-transform group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-slate-950 rounded-[2rem] p-10 sm:p-14 shadow-2xl relative overflow-hidden text-white">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/10 rounded-full blur-3xl -z-0"></div>
            <div class="relative z-10">
                <h2 class="text-3xl font-extrabold tracking-tight mb-8">Pesan Pimpinan</h2>
                @if($greeting)
                    <div class="flex flex-col sm:flex-row gap-8 items-start">
                        <img src="{{ asset('storage/' . $greeting->image) }}"
                             alt="Sambutan pimpinan"
                             class="h-28 w-28 rounded-2xl object-cover shadow-lg border border-slate-800 shrink-0">
                        <div class="leading-relaxed text-slate-300 text-lg italic">
                            "{!! \Illuminate\Support\Str::limit(strip_tags($greeting->content), 240) !!}"
                        </div>
                    </div>
                @else
                    <p class="text-slate-400">Data pesan pimpinan belum tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- FASILITAS --}}
<section class="bg-white py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
            <div class="max-w-2xl">
                <span class="text-sm font-bold uppercase tracking-widest text-blue-600">Infrastruktur</span>
                <h2 class="mt-3 text-4xl font-extrabold text-slate-900 tracking-tight">Fasilitas Modern</h2>
                <p class="mt-4 text-lg text-slate-600">
                    Lingkungan belajar yang didukung infrastruktur terbaik standar internasional.
                </p>
            </div>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($facilities as $facility)
                <article class="group rounded-[2rem] border border-slate-100 bg-slate-50 overflow-hidden hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-300">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $facility->image) }}"
                             alt="Fasilitas kampus"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">Fasilitas Kampus</h3>
                        <p class="mt-3 leading-relaxed text-slate-600 text-sm">
                            {{ \Illuminate\Support\Str::limit(strip_tags($facility->content), 120) }}
                        </p>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[2rem] border-2 border-dashed border-slate-200 p-16 text-center">
                    <span class="text-4xl block mb-4">🏢</span>
                    <p class="text-slate-500 font-medium">Data fasilitas sedang dalam pembaruan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- INFORMASI TERKINI --}}
<section class="bg-slate-50 py-24 border-t border-slate-200">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-sm font-bold uppercase tracking-widest text-blue-600">Update Kampus</span>
            <h2 class="mt-3 text-4xl font-extrabold text-slate-900 tracking-tight">Informasi Terkini</h2>
        </div>

        <div class="grid lg:grid-cols-12 gap-12">
            {{-- BERITA UTAMA --}}
            <div class="lg:col-span-8">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-bold text-slate-900">Berita Terbaru</h3>
                    <a href="{{ route('news') }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors">Lihat Semua Berita &rarr;</a>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    @forelse($latestNews as $item)
                        <a href="{{ route('news') }}" class="group block bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-slate-200/50 transition-all">
                            <div class="h-48 overflow-hidden relative">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-sm rounded-lg text-xs font-bold text-slate-900">
                                    {{ $item->created_at?->format('d M Y') }}
                                </div>
                            </div>
                            <div class="p-6">
                                <h4 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $item->title }}</h4>
                                <p class="mt-3 text-sm text-slate-500 line-clamp-2">{{ strip_tags($item->content) }}</p>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full text-center py-12 text-slate-500 bg-white rounded-2xl border border-dashed border-slate-300">Belum ada berita.</div>
                    @endforelse
                </div>
            </div>

            {{-- PENGUMUMAN --}}
            <div class="lg:col-span-4">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-bold text-slate-900">Pengumuman</h3>
                    <a href="{{ route('announcements') }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors">Semua &rarr;</a>
                </div>
                <div class="space-y-4">
                    @forelse($latestAnnouncements as $announcement)
                        <a href="{{ route('announcements') }}" class="block bg-white p-5 rounded-2xl border border-slate-200 hover:border-blue-500 hover:shadow-md transition-all group">
                            <span class="text-xs font-bold text-blue-600 mb-2 block">{{ $announcement->created_at?->format('d M Y') }}</span>
                            <h4 class="font-bold text-slate-900 group-hover:text-blue-600 transition-colors">{{ $announcement->title }}</h4>
                        </a>
                    @empty
                        <div class="text-center py-12 text-slate-500 bg-white rounded-2xl border border-dashed border-slate-300">Belum ada pengumuman.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-blue-600 py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxyZWN0IHdpZHRoPSI4IiBoZWlnaHQ9IjgiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-30"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h2 class="text-4xl font-extrabold text-white tracking-tight mb-6">Mulai Perjalanan Akademik Anda Bersama Kami</h2>
        <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">Bergabunglah dengan komunitas akademik yang inovatif dan siap mencetak pemimpin masa depan.</p>
        <a href="{{ route('profile') }}" class="inline-flex items-center justify-center px-8 py-4 rounded-full bg-slate-950 text-white font-bold hover:bg-slate-800 hover:scale-105 transition-all shadow-xl shadow-slate-900/20">
            Jelajahi Profil Universitas
        </a>
    </div>
</section>
@endsection