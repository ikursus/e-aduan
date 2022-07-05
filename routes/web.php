<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return env('APP_NAME');
    return redirect('/login');
});

// Route untuk memaparkan borang login
Route::get('/login', function () {
    return view('template-login');
})->name('login');

// Route untuk terima data dari borang login dan proseskan login
Route::post('/login', function () {
    return 'Login tidak berjaya';
})->name('login.authenticate');


Route::middleware(['guest'])->group(function () {

    Route::get('/dashboard', function () {

        $scriptAlert = '<script>alert(\'test\')</script>';

        return view('template-dashboard', compact('scriptAlert'));

    })->name('dashboard');

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
    Route::get('aduan/create', [AduanController::class, 'create'])->name('aduan.create');
    Route::post('aduan', [AduanController::class, 'store'])->name('aduan.store');
    Route::get('aduan/{id}/edit', [AduanController::class, 'edit'])->name('aduan.edit');
    Route::patch('aduan/{id}', [AduanController::class, 'update'])->name('aduan.update');
    Route::delete('aduan/{id}', [AduanController::class, 'destroy'])->name('aduan.destroy');

    // Route::resource('users', UserController::class)->except(['show', 'destroy']);
    // Route::resource('users', UserController::class)->only(['create', 'index', 'store']);
    Route::resource('users', UserController::class);

    Route::get('/logout', function () {
        return 'Login berjaya';
    })->name('logout');

});
