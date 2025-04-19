<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Antrean Uang')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-pink-500 via-purple-600 to-indigo-600 min-h-screen flex items-center justify-center text-white font-sans antialiased">
    <div class="w-full max-w-5xl px-4 py-6">
        {{-- Tempat konten halaman individual --}}
        @yield('content')
    </div>
</body>
</html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Antrean Uang')</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<script src="https://cdn.tailwindcss.com"></script>