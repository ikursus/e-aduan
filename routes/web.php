<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::view('/', 'welcome')->name('welcome');
Route::view('/login', 'template-login')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Bahagian admin/user
Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'template-dashboard')->name('dashboard');

    // Route::group([
    //     'prefix' => 'aduan',
    //     'as' => 'aduan.'
    // ], function () {

    //     Route::get('/', [AduanController::class, 'index'])->name('index');
    //     Route::get('/create', [AduanController::class, 'create'])->name('create');
    //     Route::post('/create', [AduanController::class, 'store'])->name('store');
    //     Route::get('/{id}/edit', [AduanController::class, 'edit'])->name('edit');
    //     Route::patch('/{id}', [AduanController::class, 'update'])->name('update');
    //     Route::delete('/{id}', [AduanController::class, 'destroy'])->name('destroy');

    // });

    Route::get('aduan/', [AduanController::class, 'index'])->name('aduan.index');

    Route::get('aduan/{id}/edit', [AduanController::class, 'edit'])->name('aduan.edit');
    Route::get('aduan/create', [AduanController::class, 'create'])->name('aduan.create');
    Route::post('aduan', [AduanController::class, 'store'])->name('aduan.store');
    Route::patch('aduan/{id}', [AduanController::class, 'update'])->name('aduan.update');
    Route::delete('aduan/{id}', [AduanController::class, 'destroy'])->name('aduan.destroy');

    // Route::resource('users', UserController::class)->except(['show', 'destroy']);
    // Route::resource('users', UserController::class)->only(['create', 'index', 'store']);
    Route::resource('users', UserController::class);

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});
