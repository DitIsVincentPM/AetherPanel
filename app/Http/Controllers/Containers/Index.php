<?php

namespace App\Http\Controllers\Containers;

use App\Models\Container;

class Index
{
    public function show($id)
    {
        // Find the container by its ID
        $container = Container::with('containerType')->find($id);

        // If the container doesn't exist, handle it
        if (!$container) {
            return redirect()->route('dashboard')->with('error', 'Container not found');
        }

        // Return the container data to a view
        return view('containers.index', compact('container'));
    }

    public function filesystem($id) {

        // Find the container by its ID
        $container = Container::with('containerType')->find($id);

        // If the container doesn't exist, handle it
        if (!$container) {
            return redirect()->route('dashboard')->with('error', 'Container not found');
        }

        // Return the container data to a view
        return view('containers.files', compact('container'));
    }
}
