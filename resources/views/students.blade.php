@extends('layouts.app')

@section('title', 'Direktori Mahasiswa')

@section('content')
{{-- HERO SECTION --}}
<div class="bg-slate-950 text-white pt-24 pb-32 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxyZWN0IHdpZHRoPSI4IiBoZWlnaHQ9IjgiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-20"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-blue-600 rounded-full blur-[100px] opacity-30"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/50 border border-slate-700 backdrop-blur-md mb-6">
            <span class="text-xl">🎓</span>
            <span class="text-sm font-bold text-blue-200 tracking-widest uppercase">Kemahasiswaan</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6">Direktori Mahasiswa</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-lg leading-relaxed">Pusat informasi civitas akademika dan mahasiswa aktif yang menjadi bagian dari keluarga besar A Kampus Maju.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-20 pb-24">
    <div class="bg-white rounded-[2.5rem] p-8 sm:p-12 shadow-2xl shadow-slate-200/50 border border-slate-100 min-h-[500px]">
        @if($students && $students->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($students as $mhs)
                <div class="group bg-white rounded-3xl p-6 border border-slate-200 hover:border-blue-500 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 flex items-center gap-5 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-blue-50/50 rounded-bl-3xl -z-0 transition-transform group-hover:scale-150"></div>
                    
                    <div class="relative z-10 shrink-0 w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-50 to-slate-100 text-blue-600 flex items-center justify-center font-extrabold text-2xl shadow-sm border border-slate-200 group-hover:bg-gradient-to-br group-hover:from-blue-600 group-hover:to-indigo-600 group-hover:text-white transition-all">
                        {{ substr($mhs->namalengkap ?? $mhs->name, 0, 1) }}
                    </div>
                    
                    <div class="relative z-10 flex-1 min-w-0">
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition-colors truncate">
                            {{ $mhs->namalengkap ?? $mhs->name }}
                        </h3>
                        <div class="mt-1 font-mono text-xs text-slate-500 bg-slate-100 px-2 py-0.5 rounded inline-block">
                            NIM: {{ $mhs->nim ?? $mhs->id }}
                        </div>
                        <div class="mt-2 text-xs font-bold text-slate-600 truncate flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            {{ $mhs->programstudi_1 ?? $mhs->major ?? 'Mahasiswa Aktif' }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-16 flex justify-center">
                {{ $students->links() }}
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-full py-20 text-center">
                <div class="w-24 h-24 rounded-full bg-slate-50 flex items-center justify-center text-5xl mb-6 shadow-inner">
                    🎓
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Belum Ada Data Mahasiswa</h3>
                <p class="text-slate-500 text-lg max-w-md">Data direktori mahasiswa saat ini sedang dalam proses sinkronisasi.</p>
            </div>
        @endif
    </div>
</div>
@endsection
