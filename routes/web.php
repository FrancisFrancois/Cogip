<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/companies', function () {
    return view('layouts.companies');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/invoices', function () {
    return view('layouts.invoices');
});

Route::get('/contacts', function () {
    return view('layouts.contacts');
});

Route::get('/newinvoice', function () {
    return view('layouts.newinvoice');
});

Route::get('/newcontact', function () {
    return view('layouts.newcontact');
});

Route::get('/newcompany', function () {
    return view('layouts.newcompany');
});

Route::get('/detailcontact', function () {
    return view('layouts.detailcontact');
});

Route::get('/detailcompany', function () {
    return view('layouts.detailcompany');
});

Route::get('/detailinvoice', function () {
    return view('layouts.detailinvoice');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
