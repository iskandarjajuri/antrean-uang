@extends('layouts.app')

{{-- Judul halaman --}}
@section('title', 'Detail Order')

{{-- Konten utama --}}
@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">

        {{-- Header halaman --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-bold text-indigo-700">Detail Order</h1>
            <a href="{{ route('order.create') }}"
               class="text-sm text-indigo-600 hover:underline">
                ← Kembali ke Daftar Order
            </a>
        </div>

        {{-- Grup informasi detail order --}}
        <fieldset class="space-y-4 text-sm text-gray-700">
            {{-- ID Order --}}
            <div class="flex justify-between">
                <span class="font-medium">ID Order:</span>
                <span>{{ $order->id ?? 'N/A' }}</span>
            </div>

            {{-- ID hash kecil --}}
            @if (!empty($order->id))
            <div class="flex justify-between text-xs text-gray-500 italic">
                <span>ID Hash:</span>
                <span>{{ substr(md5($order->id), 0, 8) }}</span>
            </div>
            @endif

            {{-- Nama Pegawai --}}
            <div class="flex justify-between">
                <span class="font-medium">Nama Pegawai:</span>
                <span>{{ $order->nama ?? 'N/A' }}</span>
            </div>

            {{-- Tanggal Order (format d-m-Y) --}}
            <div class="flex justify-between">
                <span class="font-medium">Tanggal Order:</span>
                <span>
                    {{ $order->tanggal ? \Carbon\Carbon::parse($order->tanggal)->format('d-m-Y') : 'N/A' }}
                </span>
            </div>

            {{-- Deskripsi Order --}}
            <div class="flex justify-between">
                <span class="font-medium">Deskripsi:</span>
                <span>{{ $order->deskripsi ?? 'N/A' }}</span>
            </div>

            {{-- Status Order dengan Badge --}}
            <div class="flex justify-between">
                <span class="font-medium">Status:</span>
                @php
                    $status = $order->status ?? 'Belum diproses';
                    $color = match($status) {
                        'Diproses' => 'bg-yellow-100 text-yellow-700',
                        'Selesai' => 'bg-green-100 text-green-700',
                        default => 'bg-gray-100 text-gray-700',
                    };
                @endphp
                <span class="px-2 py-1 rounded text-xs font-medium {{ $color }}">
                    {{ $status }}
                </span>
            </div>
        </fieldset>
    </div>
@endsection
