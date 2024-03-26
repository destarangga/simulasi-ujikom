<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        //ambil input bagian email & password
        $user = $request->only('email', 'password');
        //simpan data tersebut ke fitur auth sebagai identitas
        if (Auth::attempt($user)) {

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin/dashboard');
            }elseif(Auth::user()->role == 'petugas'){
                return redirect()->route('customers');

            }
        }else {
            return redirect()->back()->with('eror', 'Gagal Login!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
