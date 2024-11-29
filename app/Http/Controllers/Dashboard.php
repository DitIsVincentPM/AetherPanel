<?php

namespace App\Http\Controllers;

use App\Models\Container;

class Dashboard
{
    public function index()
    {
        $containers = Container::get();
        return view('dashboard', ['containers' => $containers]);
    }
}
