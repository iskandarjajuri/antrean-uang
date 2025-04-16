@extends('layouts.app')

{{-- Judul halaman --}}
@section('title', 'Pengaturan')

{{-- Konten utama halaman pengaturan --}}
@section('content')
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-xl font-bold text-indigo-700 mb-6">Pengaturan</h1>

        {{-- Navigasi pengaturan --}}
        <ul class="space-y-4 text-sm">
            <li>
                <a href="{{ route('settings.userinfo') }}"
                   class="inline-block w-full px-4 py-2 bg-indigo-100 text-indigo-800 rounded hover:bg-indigo-200 transition">
                    👉 Lihat Info Pengguna
                </a>
            </li>

            {{-- Tombol logout pengguna --}}
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full px-4 py-2 bg-red-100 text-red-700 rounded hover:bg-red-200 transition">
                        🚪 Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
@endsection
