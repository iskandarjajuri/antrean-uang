@extends('layouts.app')

@section('title', 'Detail Order')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-xl font-bold text-indigo-700 mb-6">Detail Order</h1>

        <div class="space-y-4 text-sm text-gray-700">
            <div class="flex justify-between">
                <span class="font-medium">ID Order:</span>
                <span>{{ $order->id ?? 'N/A' }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium">Nama Pegawai:</span>
                <span>{{ $order->nama ?? 'N/A' }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium">Tanggal Order:</span>
                <span>{{ $order->tanggal ?? 'N/A' }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium">Deskripsi:</span>
                <span>{{ $order->deskripsi ?? 'N/A' }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium">Status:</span>
                <span>{{ $order->status ?? 'Belum diproses' }}</span>
            </div>
        </div>
    </div>
@endsection
