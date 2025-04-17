@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto py-12 px-6">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-3">🚀 Selamat Datang di Dashboard</h1>
            <p class="text-lg text-gray-600">Kelola order, pantau rekap, dan sesuaikan pengaturan dengan mudah dan cepat.</p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <a href="{{ route('order.create') }}" class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white text-center py-6 px-4 rounded-xl shadow-lg hover:scale-105 transform transition duration-300">
                <div class="text-3xl mb-2">✍️</div>
                <div class="font-semibold">Buat Order</div>
            </a>
            <a href="{{ route('order.admin.list') }}" class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-center py-6 px-4 rounded-xl shadow-lg hover:scale-105 transform transition duration-300">
                <div class="text-3xl mb-2">📋</div>
                <div class="font-semibold">Daftar Order</div>
            </a>
            <a href="{{ route('recap.index') }}" class="bg-gradient-to-r from-green-500 to-emerald-500 text-white text-center py-6 px-4 rounded-xl shadow-lg hover:scale-105 transform transition duration-300">
                <div class="text-3xl mb-2">📊</div>
                <div class="font-semibold">Rekap Order</div>
            </a>
            <a href="{{ route('settings.index') }}" class="bg-gradient-to-r from-gray-700 to-gray-500 text-white text-center py-6 px-4 rounded-xl shadow-lg hover:scale-105 transform transition duration-300">
                <div class="text-3xl mb-2">⚙️</div>
                <div class="font-semibold">Pengaturan</div>
            </a>
        </div>
    </div>
@endsection
