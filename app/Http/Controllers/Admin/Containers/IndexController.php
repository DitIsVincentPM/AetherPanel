<?php

namespace App\Http\Controllers\Admin\Containers;

use App\Models\Container;
use App\Models\Node;

class IndexController
{
    public function index()
    {
        $containers = Container::get();

        return view('admin.containers.index', ['containers' => $containers]);
    }
}
