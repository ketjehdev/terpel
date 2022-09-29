<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Library\PublicController;

class WebController extends Controller
{
    public function __construct()
    {
        $publicController = new PublicController();

        $this->main = $publicController;

        $this->adminTotal = $this->main->total_admin();
    }

    public function home()
    {
        $adminTotal = $this->adminTotal;
        return $adminTotal;
    }
}
