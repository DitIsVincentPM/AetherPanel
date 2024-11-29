<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Containers\Index;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::get('/container/{id}', [Index::class, 'show'])->name('container.index');
    Route::get('/container/{id}/files', [Index::class, 'filesystem'])->name('container.files');
    Route::get('/container/{id}/users', [Index::class, 'filesystem'])->name('container.users');
    Route::get('/container/{id}/databases', [Index::class, 'filesystem'])->name('container.databases');
    Route::get('/container/{id}/settings', [Index::class, 'filesystem'])->name('container.settings');

});
