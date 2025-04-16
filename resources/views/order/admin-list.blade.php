@extends('layouts.app')

{{-- Judul halaman --}}
@section('title', 'Daftar Order (Admin)')

{{-- Konten utama --}}
@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        {{-- Header --}}
        <h1 class="text-xl font-bold mb-4 text-indigo-700">Daftar Order (Admin)</h1>

        {{-- Tabel daftar order --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-indigo-50 text-indigo-800 font-semibold">
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Nama Pegawai</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    {{-- Looping data order --}}
                    @forelse ($orders as $order)
                        <tr class="hover:bg-indigo-50">
                            <td class="px-4 py-2 border">{{ $order->id }}</td>
                            <td class="px-4 py-2 border">{{ $order->pegawai->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">
                                {{ \Carbon\Carbon::parse($order->tanggal)->format('d-m-Y') }}
                            </td>
                            <td class="px-4 py-2 border">
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
                            <td class="px-4 py-2 border">
                                <a href="{{ route('order.detail', $order->id) }}" class="text-indigo-600 hover:underline">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        {{-- Tampilkan jika data kosong --}}
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada data order.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer waktu tampil --}}
        <p class="text-xs text-gray-400 mt-4 text-right">
            Diperbarui: {{ now()->format('d-m-Y H:i') }}
        </p>
    </div>
@endsection
