<footer id="kontak" class="bg-slate-950 text-slate-400 mt-20 border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-8">

        {{-- KOLOM 1: LOGO + ALAMAT --}}
        <div class="md:col-span-12 lg:col-span-5">
            <div class="flex items-center gap-3 mb-6">
                @isset($footer)
                    <img src="{{ asset('storage/' . $footer->image) }}"
                         alt="Logo A Kampus Maju"
                         class="h-12 w-12 object-contain brightness-0 invert">
                @endisset
                <h3 class="text-white text-2xl font-extrabold tracking-tight">A Kampus Maju</h3>
            </div>
            <p class="text-sm leading-relaxed text-slate-400 max-w-md">
                {{ $footer->alamat ?? 'Alamat institusi akan ditampilkan di sini. Membangun generasi cerdas dan berkarakter.' }}
            </p>
            
            {{-- SOSIAL MEDIA --}}
            @isset($footer)
                <div class="flex gap-4 mt-8">
                    <a href="{{ $footer->link_instagram }}" target="_blank" rel="noopener"
                       aria-label="Instagram" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">📷</a>
                    <a href="{{ $footer->link_youtube }}" target="_blank" rel="noopener"
                       aria-label="YouTube" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">▶️</a>
                    <a href="{{ $footer->link_linkedin }}" target="_blank" rel="noopener"
                       aria-label="LinkedIn" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">💼</a>
                    <a href="{{ $footer->link_facebook }}" target="_blank" rel="noopener"
                       aria-label="Facebook" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">🌐</a>
                </div>
            @endisset
        </div>

        {{-- KOLOM 2: NAVIGASI --}}
        <div class="md:col-span-6 lg:col-span-3">
            <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-6">Navigasi Utama</h4>
            <ul class="space-y-3 text-sm font-medium">
                <li><a href="{{ route('home') }}"          class="hover:text-blue-400 hover:translate-x-1 inline-block transition-all">Beranda</a></li>
                <li><a href="{{ route('profile') }}"       class="hover:text-blue-400 hover:translate-x-1 inline-block transition-all">Profil Universitas</a></li>
                <li><a href="{{ route('lectures') }}"      class="hover:text-blue-400 hover:translate-x-1 inline-block transition-all">Direktori Dosen</a></li>
                <li><a href="{{ route('students') }}"      class="hover:text-blue-400 hover:translate-x-1 inline-block transition-all">Direktori Mahasiswa</a></li>
            </ul>
        </div>

        {{-- KOLOM 3: INFORMASI --}}
        <div class="md:col-span-6 lg:col-span-4">
            <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-6">Hubungi Kami</h4>
            <ul class="space-y-4 text-sm">
                @isset($footer)
                    <li class="flex items-start gap-3 group">
                        <div class="w-8 h-8 rounded-lg bg-slate-900 flex items-center justify-center group-hover:bg-blue-900 transition-colors">
                            <span aria-hidden="true" class="text-blue-400">✉️</span>
                        </div>
                        <div class="flex-1 pt-1.5">
                            <a href="mailto:{{ $footer->email }}" class="hover:text-white break-all transition-colors">{{ $footer->email }}</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 group mt-4">
                        <div class="w-8 h-8 rounded-lg bg-slate-900 flex items-center justify-center group-hover:bg-blue-900 transition-colors">
                            <span aria-hidden="true" class="text-blue-400">💬</span>
                        </div>
                        <div class="flex-1 pt-1.5">
                            <a href="https://wa.me/62{{ $footer->wa }}" target="_blank" rel="noopener" class="hover:text-white transition-colors">+62 {{ $footer->wa }}</a>
                        </div>
                    </li>
                @endisset
            </ul>
        </div>
    </div>

    {{-- COPYRIGHT --}}
    <div class="border-t border-slate-900 bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-medium text-slate-500">
            <div>
                © {{ date('Y') }} A Kampus Maju. Hak cipta dilindungi undang-undang.
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
</footer>
