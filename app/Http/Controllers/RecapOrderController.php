<?php

namespace App\Http\Controllers;


use Illuminate\View\View;

/**
 * Controller untuk mengelola tampilan rekapitulasi order.
 *
 * Digunakan oleh admin untuk melihat dan mencetak data rekap order
 * dalam bentuk halaman HTML atau PDF siap cetak.
 */
class RecapOrderController extends Controller
{
    /**
     * Tampilkan halaman daftar rekap order.
     *
     * @return View
     */
    public function index(): View
    {
        return view('recap.index');
    }

    /**
     * Tampilkan versi cetak dari rekap order.
     *
     * @return View
     */
    public function print(): View
    {
        return view('recap.print');
    }
}