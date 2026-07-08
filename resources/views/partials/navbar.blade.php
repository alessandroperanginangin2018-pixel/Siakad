<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-slate-950/95 backdrop-blur-md border-b border-slate-800 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            {{-- LOGO + NAMA --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                @isset($footer)
                    <img src="{{ asset('storage/' . $footer->image) }}"
                         alt="Logo A Kampus Maju"
                         class="h-10 w-10 object-contain brightness-0 invert group-hover:opacity-90 transition-opacity">
                @endisset
                <span class="text-xl font-extrabold text-white tracking-tight group-hover:text-blue-400 transition-colors">A Kampus Maju</span>
            </a>

            {{-- MENU DESKTOP --}}
            <ul class="hidden lg:flex items-center gap-8 text-sm font-semibold text-slate-300">
                <li><a href="{{ route('home') }}"          class="hover:text-white transition-colors">Beranda</a></li>
                <li><a href="{{ route('profile') }}"       class="hover:text-white transition-colors">Profil</a></li>
                <li><a href="{{ route('lectures') }}"      class="hover:text-white transition-colors">Dosen</a></li>
                <li><a href="{{ route('students') }}"      class="hover:text-white transition-colors">Mahasiswa</a></li>
                <li><a href="{{ route('announcements') }}" class="hover:text-white transition-colors">Pengumuman</a></li>
                <li><a href="{{ route('news') }}"          class="hover:text-white transition-colors">Berita</a></li>
            </ul>

            {{-- CTA --}}
            <div class="hidden lg:flex items-center gap-4">
                <a href="{{ route('home') }}#kontak"
                   class="inline-flex items-center justify-center px-6 py-2.5 rounded-full bg-blue-600 text-white text-sm font-bold shadow-lg shadow-blue-600/30 hover:bg-blue-500 hover:scale-105 hover:shadow-blue-500/40 transition-all active:scale-95">
                    Hubungi Kami
                </a>
            </div>

            {{-- TOMBOL MENU MOBILE --}}
            <button @click="open = !open"
                    class="lg:hidden p-2 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors"
                    aria-label="Toggle menu">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- MENU MOBILE --}}
        <div x-show="open" x-cloak 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden pb-6 pt-2 border-t border-slate-800">
            <ul class="flex flex-col gap-1 text-base font-semibold text-slate-300">
                <li><a href="{{ route('home') }}"          class="block py-3 px-4 rounded-xl hover:bg-slate-800 hover:text-white transition-all">Beranda</a></li>
                <li><a href="{{ route('profile') }}"       class="block py-3 px-4 rounded-xl hover:bg-slate-800 hover:text-white transition-all">Profil</a></li>
                <li><a href="{{ route('lectures') }}"      class="block py-3 px-4 rounded-xl hover:bg-slate-800 hover:text-white transition-all">Dosen</a></li>
                <li><a href="{{ route('students') }}"      class="block py-3 px-4 rounded-xl hover:bg-slate-800 hover:text-white transition-all">Mahasiswa</a></li>
                <li><a href="{{ route('announcements') }}" class="block py-3 px-4 rounded-xl hover:bg-slate-800 hover:text-white transition-all">Pengumuman</a></li>
                <li><a href="{{ route('news') }}"          class="block py-3 px-4 rounded-xl hover:bg-slate-800 hover:text-white transition-all">Berita</a></li>
            </ul>
            <div class="mt-4 px-4">
                <a href="{{ route('home') }}#kontak"
                   class="flex w-full items-center justify-center px-6 py-3 rounded-xl bg-blue-600 text-white text-base font-bold hover:bg-blue-500 transition-colors">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</nav>
