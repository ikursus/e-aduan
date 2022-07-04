<?php

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
});


Route::middleware(['guest'])->group(function () {

    Route::get('/dashboard', function () {
        return view('template-dashboard');
    });

    Route::group([
        'prefix' => 'aduan',
        'as' => 'aduan.'
    ], function () {

        Route::get('/baru', function () {
            return view('template-borang-aduan');
        })->name('baru');

        // Route untuk terima data dari borang aduan
        Route::post('/baru', function () {
            return 'Aduan tidak berjaya dikirimkan';
        })->name('simpan');


    });

    Route::get('/logout', function () {
        return 'Login berjaya';
    })->name('logout');

});
