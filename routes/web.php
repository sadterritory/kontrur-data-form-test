<?php

use App\Http\Controllers\UserDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

#User zone begin

Route::get('/user', [UserDataController::class, 'index'])->name('user.index');

Route::get('/user/create', [UserDataController::class, 'create'])->name('user.create');

Route::get('/user/{user}', [UserDataController::class, 'show'])->name('user.show');

Route::get('/user/{user}/edit', [UserDataController::class, 'edit'])->name('user.edit');

Route::patch('/user/{user}', [UserDataController::class, 'update'])->name('user.update');

Route::post('/user', [UserDataController::class, 'store'])->name('user.store');

Route::delete('/user/{user}', [UserDataController::class, 'destroy'])->name('user.destroy');

#User zone end