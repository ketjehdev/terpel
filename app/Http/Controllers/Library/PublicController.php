<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class PublicController extends Controller
{
    public function total_admin()
    {
        $data = User::count();

        return $data;
    }
}
