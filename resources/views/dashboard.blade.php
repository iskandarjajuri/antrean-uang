@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-indigo-700 mb-4">Selamat Datang di Dashboard</h1>
        <p class="text-gray-600 mb-6">Gunakan menu navigasi untuk mengakses fitur-fitur seperti order, pengaturan, dan rekap.</p>

        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2">
            <a href="{{ route('order.create') }}" class="block bg-indigo-100 hover:bg-indigo-200 text-indigo-800 text-center px-4 py-6 rounded shadow-sm">
                ✍️ Buat Order
            </a>
            <a href="{{ route('order.admin.list') }}" class="block bg-blue-100 hover:bg-blue-200 text-blue-800 text-center px-4 py-6 rounded shadow-sm">
                📋 Lihat Daftar Order (Admin)
            </a>
            <a href="{{ route('recap.index') }}" class="block bg-green-100 hover:bg-green-200 text-green-800 text-center px-4 py-6 rounded shadow-sm">
                📊 Lihat Rekap Order
            </a>
            <a href="{{ route('settings.index') }}" class="block bg-gray-100 hover:bg-gray-200 text-gray-800 text-center px-4 py-6 rounded shadow-sm">
                ⚙️ Pengaturan
            </a>
        </div>
    </div>
@endsection
