<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    // Tambahkan metode lain untuk menangani permintaan halaman pengguna di sini
}

