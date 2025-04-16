<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Antrean Uang')</title>

    {{-- Memuat file CSS utama dari Vite (Tailwind) --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen px-4 py-6 container mx-auto">
        {{-- Tempat konten halaman individual --}}
        @yield('content')
    </div>
</body>
</html>
