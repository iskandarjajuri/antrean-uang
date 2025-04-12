@extends('layouts.app')

@section('title', 'Rekap Order')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold mb-4 text-indigo-700">Rekap Order</h1>

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
                    {{-- Contoh dummy data --}}
                    <tr class="hover:bg-indigo-50">
                        <td class="px-4 py-2 border">1</td>
                        <td class="px-4 py-2 border">Budi Santoso</td>
                        <td class="px-4 py-2 border">2025-04-09</td>
                        <td class="px-4 py-2 border">5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
