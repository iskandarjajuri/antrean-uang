<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrean Uang</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg text-center">
            <h1 class="text-3xl font-bold text-indigo-700 mb-4">Selamat Datang 👋</h1>
            <p class="text-gray-600 mb-6">Aplikasi Antrean Uang siap membantu manajemen pemesanan dan pelaporan dengan efisien.</p>
            <div class="space-x-4">
                <a href="/dashboard" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded transition">Masuk Dashboard</a>
                <a href="/settings" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded transition">Pengaturan</a>
            </div>
        </div>
    </div>
</body>
</html>