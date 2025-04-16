<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Print Order (Admin)</title>

    {{-- Memuat CSS dari Vite dan menyiapkan gaya cetak --}}
    @vite('resources/css/app.css')
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-white text-gray-900 p-8 font-sans text-sm">
    <div class="max-w-4xl mx-auto">

        {{-- Judul halaman cetak --}}
        <h1 class="text-2xl font-bold text-center text-indigo-700 mb-6">Daftar Order - Admin</h1>

        {{-- Tabel daftar order --}}
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
                {{-- Looping data order --}}
                @forelse ($orders as $index => $order)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $order->pegawai->nama ?? '-' }}</td>
                        <td class="border px-4 py-2">
                            {{ \Carbon\Carbon::parse($order->tanggal)->format('d-m-Y') }}
                        </td>
                        <td class="border px-4 py-2">
                            @php
                                $status = $order->status ?? 'Belum Diproses';
                                $color = match($status) {
                                    'Selesai' => 'bg-green-100 text-green-700',
                                    'Diproses' => 'bg-yellow-100 text-yellow-700',
                                    default => 'bg-gray-100 text-gray-700',
                                };
                            @endphp
                            <span class="px-2 py-1 rounded text-xs font-semibold {{ $color }}">
                                {{ $status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    {{-- Jika data kosong --}}
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada data order.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Tombol cetak, tidak akan tampil di hasil print --}}
        <div class="text-center mt-8 no-print">
            <button onclick="window.print()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                Cetak Halaman
            </button>
        </div>

        {{-- Waktu cetak --}}
        <p class="text-xs text-gray-500 text-center mt-6">
            Dicetak pada {{ now()->format('d-m-Y H:i') }}
        </p>
    </div>
</body>
</html>
