@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <!-- Load Google Font Montserrat for consistent branding -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Apply Montserrat font to entire page -->
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>

    <!-- Fullscreen background with gradient and centered login form -->
    <div class="flex min-h-screen items-center justify-center bg-gradient-to-r from-pink-500 via-purple-600 to-indigo-600">
        <div class="bg-purple-900 p-8 rounded-2xl shadow-lg w-full max-w-md text-white">
            
            <!-- Logo section -->
            <div class="text-center mb-10 animate-fade-in">
                <img src="/logoWEBSITE.png" alt="PUAS" class="mx-auto h-24 md:h-28 drop-shadow-lg transition-transform duration-300 ease-in-out">
            </div>
            
            <!-- Tambahkan animasi CSS -->
            <style>
                @keyframes fade-in {
                    0% { opacity: 0; transform: translateY(-10px); }
                    100% { opacity: 1; transform: translateY(0); }
                }
                
                .animate-fade-in {
                    animation: fade-in 0.6s ease-out forwards;
                }
            </style>

            <!-- Login form -->
            <form method="POST" action="{{ url('/login') }}" class="space-y-4">
                @csrf

                <!-- Email or NIP input -->
                <input type="text" name="nip" placeholder="NIP"
                    class="w-full px-4 py-2 bg-purple-800 text-white rounded focus:outline-none placeholder-gray-300" required>

                <!-- Password input -->
                <input type="password" name="password" placeholder="Password"
                    class="w-full px-4 py-2 bg-purple-800 text-white rounded focus:outline-none placeholder-gray-300" required>

                <!-- Remember me checkbox -->
                <div class="flex items-center text-sm text-gray-300">
                    <input type="checkbox" name="remember" class="mr-2 accent-purple-600">
                    Remember me
                </div>

                <!-- Submit button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white font-bold py-2 rounded-full hover:opacity-90 transition duration-300 shadow-lg">
                    LOGIN
                </button>
            </form>
        </div>
    </div>
@endsection
