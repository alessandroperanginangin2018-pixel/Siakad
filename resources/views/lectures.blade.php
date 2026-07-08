@extends('layouts.app')

@section('title', 'Direktori Dosen')

@section('content')
{{-- HERO SECTION --}}
<div class="bg-slate-950 text-white pt-24 pb-32 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxyZWN0IHdpZHRoPSI4IiBoZWlnaHQ9IjgiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-20"></div>
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-600 rounded-full blur-[100px] opacity-30"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/50 border border-slate-700 backdrop-blur-md mb-6">
            <span class="text-xl">👨‍🏫</span>
            <span class="text-sm font-bold text-blue-200 tracking-widest uppercase">Akademik</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6">Direktori Tenaga Pengajar</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-lg leading-relaxed">Profil dosen profesional dan kompeten yang berdedikasi membimbing mahasiswa menuju masa depan gemilang.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-20 pb-24">
    <div class="bg-white rounded-[2.5rem] p-8 sm:p-12 shadow-2xl shadow-slate-200/50 border border-slate-100 min-h-[500px]">
        @if($lectures && $lectures->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($lectures as $dosen)
                <div class="group bg-slate-50 rounded-[2rem] p-8 border border-slate-100 hover:border-blue-500 hover:bg-white hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-[4rem] -z-0 transition-transform group-hover:scale-125"></div>
                    
                    <div class="relative z-10 w-28 h-28 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-white flex items-center justify-center font-extrabold text-3xl shadow-lg ring-4 ring-white mb-6 group-hover:scale-105 transition-transform">
                        {{ substr($dosen->nama ?? $dosen->name, 0, 2) }}
                    </div>
                    
                    <div class="relative z-10 w-full">
                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-2 min-h-[3.5rem] flex items-center justify-center">
                            {{ $dosen->nama ?? $dosen->name }}
                        </h3>
                        
                        <div class="mt-4 mb-4 h-px w-12 bg-slate-200 mx-auto group-hover:bg-blue-200 transition-colors"></div>
                        
                        <div class="space-y-2">
                            <span class="inline-block px-3 py-1 bg-blue-50 text-blue-700 font-bold text-xs rounded-lg uppercase tracking-wider w-full truncate">
                                {{ $dosen->nidn ?? 'Dosen Tetap' }}
                            </span>
                            <p class="text-sm text-slate-500 font-medium line-clamp-2">
                                {{ $dosen->jabatan ?? $dosen->pendidikan ?? 'Tenaga Pengajar Akademik' }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-16 flex justify-center">
                {{ $lectures->links() }}
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-full py-20 text-center">
                <div class="w-24 h-24 rounded-full bg-slate-50 flex items-center justify-center text-5xl mb-6 shadow-inner">
                    🔍
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Belum Ada Data Dosen</h3>
                <p class="text-slate-500 text-lg max-w-md">Data tenaga pengajar akan segera diperbarui melalui panel administrator kampus.</p>
            </div>
        @endif
    </div>
</div>
@endsection
