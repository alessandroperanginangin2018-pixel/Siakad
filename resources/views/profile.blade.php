@extends('layouts.app')

@section('title', 'Profil Kampus')

@section('content')
{{-- HERO SECTION --}}
<div class="bg-slate-950 text-white pt-24 pb-32 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxyZWN0IHdpZHRoPSI4IiBoZWlnaHQ9IjgiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-20"></div>
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-600 rounded-full blur-[100px] opacity-30"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6">Profil Institusi</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-lg leading-relaxed">Mengenal lebih dekat sejarah, visi misi, dan kepemimpinan A Kampus Maju dalam membangun pendidikan berkualitas.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-20 pb-24 space-y-12">
    
    {{-- TENTANG KAMI --}}
    <div class="bg-white p-10 sm:p-14 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-600/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
            </div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Tentang Universitas</h2>
        </div>
        
        @if($aboutme)
            <div class="prose max-w-none text-slate-600 text-lg leading-relaxed space-y-6">
                @if(!empty($aboutme->title))
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $aboutme->title }}</h3>
                @endif
                <div class="text-slate-600 leading-relaxed space-y-4">
                    {!! $aboutme->content ?? $aboutme->description !!}
                </div>
            </div>
        @else
            <p class="text-slate-600 text-lg leading-relaxed">
                A Kampus Maju adalah lembaga pendidikan tinggi terkemuka yang berkomitmen mencetak lulusan berintegritas tinggi, unggul secara akademis, dan siap bersaing di kancah global.
            </p>
        @endif
    </div>

    {{-- VISI & MISI --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-blue-600 text-white p-10 sm:p-14 rounded-[2rem] shadow-xl shadow-blue-600/20 relative overflow-hidden group">
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-colors"></div>
            <div class="relative z-10">
                <h3 class="text-3xl font-extrabold mb-6 tracking-tight flex items-center gap-3">
                    <span>🎯</span> Visi Kampus
                </h3>
                <div class="text-blue-50 text-lg leading-relaxed prose prose-invert">
                    {!! $visimisi->visi ?? 'Menjadi universitas unggul dan berdaya saing internasional dalam pengembangan ilmu pengetahuan dan teknologi.' !!}
                </div>
            </div>
        </div>
        <div class="bg-slate-900 text-white p-10 sm:p-14 rounded-[2rem] shadow-xl relative overflow-hidden group">
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-blue-500/20 rounded-full blur-2xl group-hover:bg-blue-500/30 transition-colors"></div>
            <div class="relative z-10">
                <h3 class="text-3xl font-extrabold mb-6 tracking-tight flex items-center gap-3">
                    <span>🚀</span> Misi Kampus
                </h3>
                <div class="text-slate-300 text-lg leading-relaxed prose prose-invert">
                    {!! $visimisi->misi ?? "<ul><li>Menyelenggarakan pendidikan berkualitas.</li><li>Melaksanakan penelitian inovatif.</li><li>Pengabdian masyarakat.</li></ul>" !!}
                </div>
            </div>
        </div>
    </div>

    {{-- SEJARAH --}}
    <div class="bg-white p-10 sm:p-14 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 bg-slate-100 text-slate-700 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Sejarah Singkat</h2>
        </div>
        
        @if($history)
            <div class="prose max-w-none text-slate-600 text-lg leading-relaxed space-y-6">
                @if(!empty($history->title))
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $history->title }}</h3>
                @endif
                <div class="text-slate-600 leading-relaxed space-y-4">
                    {!! $history->description ?? $history->content !!}
                </div>
            </div>
        @else
            <p class="text-slate-600 text-lg leading-relaxed">
                Sejak didirikan, kampus ini terus berkembang dan memperluas jaringan kerjasama baik nasional maupun internasional untuk menunjang mutu pendidikan mahasiswa.
            </p>
        @endif
    </div>

    {{-- PIMPINAN --}}
    @if($rektors && $rektors->count() > 0)
    <div class="pt-12">
        <div class="text-center mb-12">
            <span class="text-sm font-bold uppercase tracking-widest text-blue-600">Struktur Organisasi</span>
            <h2 class="mt-3 text-4xl font-extrabold text-slate-900 tracking-tight">Pimpinan Universitas</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($rektors as $rektor)
            <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-slate-200/50 transition-all text-center group">
                <div class="relative w-32 h-32 mx-auto mb-6">
                    <div class="absolute inset-0 bg-blue-600 rounded-full scale-105 opacity-0 group-hover:opacity-10 transition-all duration-300"></div>
                    @if(isset($rektor->image))
                        <img src="{{ asset('storage/' . $rektor->image) }}" alt="{{ $rektor->nama ?? $rektor->name }}" class="w-full h-full object-cover rounded-full ring-4 ring-slate-50 shadow-lg">
                    @else
                        <div class="w-full h-full rounded-full bg-slate-100 text-slate-400 flex items-center justify-center text-4xl shadow-lg ring-4 ring-slate-50">👨‍💼</div>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">{{ $rektor->nama ?? $rektor->name }}</h3>
                <span class="inline-block mt-3 px-4 py-1.5 bg-blue-50 text-blue-700 font-bold text-xs rounded-full uppercase tracking-wider">
                    {{ $rektor->jabatan ?? 'Pimpinan' }}
                </span>
                @if(isset($rektor->periode))
                    <p class="mt-4 text-sm text-slate-500 font-medium">{{ $rektor->periode }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
