<?php

namespace App\Http\Controllers;


use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Tampilkan form untuk membuat order baru.
     *
     * @return View
     */
    public function create(): View
    {
        return view('order.create');
    }

    /**
     * Tampilkan detail order berdasarkan ID.
     *
     * @param  int  $id
     * @return View
     */
    public function detail(int $id): View
    {
        return view('order.detail', ['id' => $id]);
    }

    /**
     * Tampilkan daftar order untuk admin.
     *
     * @return View
     */
    public function adminList(): View
    {
        return view('order.admin-list');
    }

    /**
     * Tampilkan halaman cetak daftar order untuk admin.
     *
     * @return View
     */
    public function adminPrint(): View
    {
        return view('order.admin-print');
    }
}
