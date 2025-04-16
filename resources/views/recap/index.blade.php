@extends('layouts.app')

{{-- Judul halaman --}}
@section('title', 'Rekap Order')

{{-- Konten utama halaman rekap order --}}
@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold mb-4 text-indigo-700">Rekap Order</h1>

        {{-- Tombol untuk mencetak halaman sebagai PDF --}}
        <div class="mb-4">
            <a href="{{ route('recap.print') }}" target="_blank"
               class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                🖨️ Cetak PDF
            </a>
        </div>

        {{-- Tabel rekap data order --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-indigo-50 text-indigo-800 font-semibold">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Pegawai</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Total Order</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    {{-- Looping data rekap order --}}
                    @forelse ($orders as $index => $order)
                        <tr class="hover:bg-indigo-50">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $order->pegawai->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $order->tanggal->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 border">{{ $order->total }}</td>
                        </tr>
                    {{-- Tampilkan pesan jika data kosong --}}
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-4 py-6 text-gray-500">
                                Tidak ada data order yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
