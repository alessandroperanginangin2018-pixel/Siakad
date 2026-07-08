@extends('layouts.app')

@section('title', 'Pengumuman Kampus')

@section('content')
{{-- HERO SECTION --}}
<div class="bg-slate-950 text-white pt-24 pb-32 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxyZWN0IHdpZHRoPSI4IiBoZWlnaHQ9IjgiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-20"></div>
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-600 rounded-full blur-[100px] opacity-30"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/50 border border-slate-700 backdrop-blur-md mb-6">
            <span class="text-xl">📢</span>
            <span class="text-sm font-bold text-blue-200 tracking-widest uppercase">Informasi Resmi</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6">Pengumuman Kampus</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-lg leading-relaxed">Dapatkan pembaruan dan informasi resmi terbaru seputar kegiatan akademik dan non-akademik di A Kampus Maju.</p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-20 pb-24">
    <div class="bg-white rounded-[2.5rem] p-6 sm:p-10 shadow-2xl shadow-slate-200/50 border border-slate-100 min-h-[500px]">
        @if($announcements && $announcements->count() > 0)
            <div class="space-y-6">
                @foreach($announcements as $announcement)
                <article class="group relative bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 hover:border-blue-500 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 overflow-hidden">
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-blue-100 group-hover:bg-blue-600 transition-colors"></div>
                    
                    <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                        <div class="shrink-0">
                            <div class="flex flex-col items-center justify-center w-20 h-20 rounded-2xl bg-blue-50 text-blue-600 border border-blue-100 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                <span class="text-3xl font-black leading-none">{{ $announcement->created_at?->format('d') ?? '-' }}</span>
                                <span class="text-xs font-bold uppercase tracking-widest mt-1">{{ $announcement->created_at?->format('M Y') ?? '-' }}</span>
                            </div>
                        </div>
                        
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-2 text-sm text-slate-500">
                                <span class="inline-flex items-center gap-1.5 font-medium bg-slate-100 px-2.5 py-1 rounded-md text-slate-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    {{ $announcement->user?->name ?? 'Administrator' }}
                                </span>
                            </div>
                            
                            <h2 class="text-2xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors mb-4 line-clamp-2">
                                {{ $announcement->title }}
                            </h2>
                            
                            <div class="prose prose-slate prose-sm sm:prose-base max-w-none text-slate-600 line-clamp-3">
                                {!! strip_tags($announcement->content) !!}
                            </div>
                        </div>
                        
                        <div class="shrink-0 hidden md:flex items-center justify-center w-12 h-12 rounded-full bg-slate-50 text-slate-400 group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors group-hover:translate-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-16 flex justify-center">
                {{ $announcements->links() }}
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-full py-24 text-center">
                <div class="w-24 h-24 rounded-full bg-slate-50 flex items-center justify-center text-5xl mb-6 shadow-inner">
                    📭
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Belum Ada Pengumuman</h3>
                <p class="text-slate-500 text-lg max-w-md">Saat ini belum ada informasi atau pengumuman terbaru dari pihak kampus.</p>
            </div>
        @endif
    </div>
</div>
@endsection
