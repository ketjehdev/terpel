<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Library\PublicController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'dashboard',
            'total_user' => User::count(),
        ];

        return view('main.index', $data);
    }

    public function myProfil()
    {
        $data = [
            'title' => 'My Profil',
        ];
        return view('main.profil', $data);
    }

    public function updateProfil(Request $request)
    {
        $request->validate(
            ['username' => 'required']
        );

        if ($request->username == true) {
            Auth::user()->update(['username' => $request->username]);
            return back()->with('success', 'Profil berhasil di update');
        }
    }
}
