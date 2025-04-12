<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Print Order (Admin)</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-white text-gray-900 p-8 font-sans text-sm">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-center text-indigo-700 mb-6">Daftar Order - Admin</h1>

        <table class="w-full border border-gray-300 border-collapse">
            <thead class="bg-indigo-50 text-indigo-800">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Pegawai</th>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                {{-- Dummy data --}}
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2">1</td>
                    <td class="border px-4 py-2">Budi Santoso</td>
                    <td class="border px-4 py-2">2025-04-09</td>
                    <td class="border px-4 py-2">Selesai</td>
                </tr>
            </tbody>
        </table>

        <div class="text-center mt-8 no-print">
            <button onclick="window.print()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                Cetak Halaman
            </button>
        </div>
    </div>
</body>
</html>
