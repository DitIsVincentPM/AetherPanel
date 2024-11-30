<?php

namespace App\Http\Controllers\Admin;

use App\Models\Container;
use App\Models\Node;

class IndexController
{
    public function index()
    {
        $containers = Container::get();
        $nodes = Node::get();

        return view('admin.index', ['containers' => $containers, 'nodes' => $nodes]);
    }
}
