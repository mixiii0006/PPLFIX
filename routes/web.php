<?php

use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\DosenController;
use illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['role' =>Auth::user()->role]);
})->middleware(['auth', 'roles:admin,user,operator'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('roles:admin')->group(function () {
    Route::resource('data_diri', DataDiriController::class);
});

Route::middleware('roles:admin,operator')->group(function () {
    Route::resource('data_dosen', DosenController::class);
});



require __DIR__.'/auth.php';
