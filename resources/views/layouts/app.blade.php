<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'A Kampus Maju') — Universitas Pilihan Anda</title>
    <meta name="description" content="@yield('meta_description', 'Website resmi Universitas A Kampus Maju.')">

    {{-- Tailwind CSS via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @stack('head')
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased" style="font-family: 'Inter', sans-serif;">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- MAIN CONTENT --}}
    <main class="min-h-[60vh]">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    @stack('scripts')
</body>
</html>
