<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Tampilkan halaman utama pengaturan dengan informasi user saat ini.
     *
     * @return View
     */
    public function index(): View
    {
        $user = Auth::user();
        return view('settings.index', compact('user'));
    }

    /**
     * Tampilkan halaman informasi pengguna dengan data user saat ini.
     *
     * @return View
     */
    public function userInfo(): View
    {
        $user = Auth::user();
        return view('settings.user-info', compact('user'));
    }
}