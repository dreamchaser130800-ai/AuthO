<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib dipanggil untuk fitur Auth

class AuthController extends Controller
{
    // 1. Menampilkan halaman form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // 2. Memproses validasi email dan password
    public function login(Request $request)
    {
        // Cek apakah email dan password diisi
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Proses pencocokan ke database
        if (Auth::attempt($credentials)) {
            // Jika cocok, buat sesi login baru agar aman
            $request->session()->regenerate();

            // Arahkan ke halaman dashboard admin
            return redirect()->intended('/admin');
        }

        // Jika salah, kembalikan ke halaman login dan tampilkan pesan error
        // (Ini sekaligus menjawab Tugas Akhir nomor 3 di modulmu)
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // 3. Memproses fungsi keluar (logout)
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus memori sesi pengguna demi keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan kembali ke halaman login
        return redirect('/admin/login');
    }
}