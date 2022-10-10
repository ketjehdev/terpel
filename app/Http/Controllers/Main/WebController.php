<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Library\PublicController;
use App\Models\User;

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
}
