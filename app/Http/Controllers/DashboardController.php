<?php

namespace App\Http\Controllers;

use App\Models\Container;

class DashboardController
{
    public function index()
    {
        $containers = Container::get();
        return view('dashboard', ['containers' => $containers]);
    }
}
