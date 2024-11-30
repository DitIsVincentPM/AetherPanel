<?php

namespace App\Http\Controllers\Admin\Nodes;

use App\Models\Container;
use App\Models\Node;

class IndexController
{
    public function index()
    {
        $nodes = Node::get();

        return view('admin.nodes.index', ['nodes' => $nodes]);
    }
}
