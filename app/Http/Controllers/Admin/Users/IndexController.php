<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Container;
use App\Models\Node;
use App\Models\User;

class IndexController
{
    public function index()
    {
        $users = User::get();

        return view('admin.index', ['users' => $users]);
    }
}
