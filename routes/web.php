<?php

use App\Http\Controllers\DataDiriController;
use illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['role' =>Auth::user()->role]);
})->middleware(['auth', 'roles:admin,user,writer'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('roles:admin')->group(function () {
    Route::resource('data-diri', DataDiriController::class);
    Route::get('/create', [DataDiriController::class, 'create'])->name('data-diri.create');
    Route::post('/User/store', [DataDiriController::class, 'store'])->name('data-diri.store');
    Route::get('/User/{datas}/edit', [DataDiriController::class, 'edit'])->name('data-diri.edit');
    Route::put('/User/{datas}/update', [DataDiriController::class, 'update'])->name('data-diri.update');
    Route::get('/User/{datas}/delete', [DataDiriController::class, 'delete'])->name('data-diri.delete');
    Route::delete('/User/{datas}/destroy', [DataDiriController::class, 'destroy'])->name('data-diri.destroy');
});

require __DIR__.'/auth.php';
