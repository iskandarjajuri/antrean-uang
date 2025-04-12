@extends('layouts.app')

@section('title', 'Buat Order Baru')

@section('content')
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-xl font-bold text-indigo-700 mb-4">Buat Order Baru</h1>

        <form action="{{ route('order.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Pegawai</label>
                <input type="text" id="nama" name="nama" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Order</label>
                <input type="date" id="tanggal" name="tanggal" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded shadow">
                    Kirim Order
                </button>
            </div>
        </form>
    </div>
@endsection
