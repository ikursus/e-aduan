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
})->name('login.authenticate');


Route::middleware(['guest'])->group(function () {

    Route::get('/dashboard', function () {
        return view('template-dashboard');
    })->name('dashboard');

    Route::group([
        'prefix' => 'aduan',
        'as' => 'aduan.'
    ], function () {

        Route::get('/', function() {

            $senaraiAduan = [
                ['id' => 1, 'pengadu' => 'Ahmad', 'email_pengadu' => 'ahmad@test.com', 'aduan' => 'Sample Aduan 1'],
                ['id' => 2, 'pengadu' => 'Siti', 'email_pengadu' => 'siti@test.com', 'aduan' => 'Sample Aduan 2'],
                ['id' => 3, 'pengadu' => 'Ali', 'email_pengadu' => 'ali@test.com', 'aduan' => 'Sample Aduan 3'],
                ['id' => 4, 'pengadu' => 'Muthu', 'email_pengadu' => 'muthu@test.com', 'aduan' => 'Sample Aduan 4'],
                ['id' => 5, 'pengadu' => 'Apek', 'email_pengadu' => 'apek@test.com', 'aduan' => 'Sample Aduan 5'],
            ];

            $title = 'Senarai Aduan';

            // return view('aduan.index');
            // return view('aduan.index')
            // ->with('senaraiAduan', $senaraiAduan)
            // ->with('title', $title);

            //return view('aduan.index', ['tajuk' => $title, 'senaraiAduan' => $senaraiAduan]);

            return view('aduan.index', compact('title', 'senaraiAduan'));

        })->name('index');

        Route::get('/baru', function () {
            return view('aduan.borang');
        })->name('baru');

        // Route untuk terima data dari borang aduan
        Route::post('/baru', function () {
            return 'Aduan berjaya dikirimkan';
        })->name('simpan');

        Route::get('/{id}/edit', function ($id) {
            return view('aduan.borang');
        })->name('edit');

        // Route untuk terima data dari borang aduan
        Route::patch('/{id}', function ($id) {
            return 'Data berjaya dikemaskini';
        })->name('update');


        Route::delete('/{id}', function ($id) {
            return 'Rekod berjaya dihapuskan!';
        })->name('destroy');

    });

    Route::get('/logout', function () {
        return 'Login berjaya';
    })->name('logout');

});
