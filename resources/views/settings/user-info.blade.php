@extends('layouts.app')

@section('title', 'Info Pengguna')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-xl font-bold text-indigo-700 mb-6">Info Pengguna</h1>

        <div class="space-y-3 text-sm text-gray-700">
            <p><span class="font-medium">Nama:</span> Iskandar Jajuri</p>
            <p><span class="font-medium">Email:</span> iskandar@example.com</p>
            <p><span class="font-medium">Role:</span> Admin</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('settings.index') }}"
               class="inline-block px-4 py-2 bg-gray-100 text-gray-800 rounded hover:bg-gray-200 transition">
                ← Kembali ke Pengaturan
            </a>
        </div>
    </div>
@endsection
