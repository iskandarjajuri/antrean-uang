<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\StoreOrderRequest;
use App\Models\PendaftaranAntrean;
use Illuminate\Support\Facades\Auth;

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
        $orders = PendaftaranAntrean::with('pegawai')->latest('tanggal_daftar')->get();

        return view('order.admin-list', compact('orders'));
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

    /**
     * Simpan order baru yang dikirimkan melalui form.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreOrderRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        PendaftaranAntrean::create([
            'pegawai_id' => Auth::id(),
            'nomor_antrean' => PendaftaranAntrean::antreanTerakhirHariIni() + 1,
            'tanggal_daftar' => now()->toDateString(),
            'tanggal_penukaran' => $request->input('tanggal', null),
            'bukti_pdf' => null,
        ]);

        return redirect()->route('dashboard')->with('success', 'Order berhasil disimpan.');
    }
}
