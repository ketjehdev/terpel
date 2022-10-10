<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Mudahkan pembelajaran dengan Terpel';
        return view('auth', compact('title'));
    }

    public function login_handle(Request $request)
    {
        $credentials = $this->validate(
            $request,
            [
                'nis' => ['required', 'numeric'],
                'password' => 'required',
            ],
            [
                'nis.required' => 'NIS gak boleh kosong cok!',
                'nis.numeric' => 'Inputan NIS harus berupa angka cok!',
                'password.required' => 'Password gak boleh kosong cok!',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->back()->with('gagal', 'NIS atau password salah!');
    }

    public function logout_handle()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
