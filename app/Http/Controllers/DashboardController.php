<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Controller untuk menampilkan halaman dashboard utama.
 */
class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard.
     *
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        // Cek apakah session login tersedia
        if (!session()->has('pegawai_id')) {
            return redirect('/login');
        }

        return view('dashboard');
    }
}
