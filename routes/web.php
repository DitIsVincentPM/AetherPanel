<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Containers\IndexController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;

use App\Http\Middleware\admin;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'container'], function () {
        Route::get('/{id}', [IndexController::class, 'show'])->name('container.index');
        Route::get('/{id}/files', [IndexController::class, 'filesystem'])->name('container.files');
        Route::get('/{id}/users', [IndexController::class, 'filesystem'])->name('container.users');
        Route::get('/{id}/databases', [IndexController::class, 'filesystem'])->name('container.databases');
        Route::get('/{id}/settings', [IndexController::class, 'filesystem'])->name('container.settings');
    });

    Route::group(['middleware' => Admin::class, 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [AdminIndexController::class, 'index'])->name('admin.dashboard');
    });
});
