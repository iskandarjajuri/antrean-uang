<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controller untuk menampilkan halaman dashboard utama.
 */
class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('dashboard');
    }
}
