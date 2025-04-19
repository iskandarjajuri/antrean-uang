<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;


class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Logout pengguna yang sedang login dan arahkan ke halaman login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // ganti dengan route login kamu
    }

    /**
     * Proses login pengguna dari tabel pegawai.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
        ]);

        // Ambil data pegawai berdasarkan NIP
        $pegawai = DB::table('pegawai')->where('nip', $request->input('nip'))->first();

        // Cek apakah data ditemukan dan password cocok (plain string sementara)
        if ($pegawai && $pegawai->password === $request->input('password')) {
            // Simpan data pegawai ke session
            $request->session()->put('pegawai_id', $pegawai->id);
            $request->session()->put('pegawai_nama', $pegawai->nama_lengkap);

            // Redirect ke halaman dashboard
            return redirect('/dashboard');
        }

        // Jika gagal, kembalikan ke halaman login dengan error
        return back()->withErrors([
            'nip' => 'NIP atau password salah.',
        ]);
    }
}
