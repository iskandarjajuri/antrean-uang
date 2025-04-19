@extends('layouts.app')

{{-- Judul halaman --}}
@section('title', 'Buat Order Baru')

{{-- Konten utama --}}
@section('content')
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-xl font-bold text-indigo-700 mb-4">Buat Order Baru</h1>

        {{-- Formulir pembuatan order --}}
        <form action="{{ route('order.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Input Tanggal --}}
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Penukaran</label>
                <input type="date" id="tanggal" name="tanggal" required value="{{ old('tanggal') }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('tanggal')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Nama Pemesan --}}
            <div>
                <label for="nama_pemesan" class="block text-sm font-medium text-gray-700">Nama Pemesan</label>
                <input type="text" id="nama_pemesan" name="nama_pemesan" required value="{{ old('nama_pemesan') }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('nama_pemesan')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Jumlah --}}
            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" required min="1" value="{{ old('jumlah') }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('jumlah')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Catatan (opsional) --}}
            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan (Opsional)</label>
                <textarea id="catatan" name="catatan" rows="3"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('catatan') }}</textarea>
                @error('catatan')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Kirim --}}
            <div class="pt-4">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded shadow">
                    Kirim Order
                </button>
            </div>
        </form>
    </div>
@endsection