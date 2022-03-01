<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InvoiceController;

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
    return view('companies.companies');
});





Route::get('/invoices', [InvoiceController::class, 'index']);

Route::get('/contacts', [ContactController::class, 'index']);





Route::get('/newinvoice', function () {
    return view('edit.newinvoice');
});

Route::get('/newcontact', function () {
    return view('edit.newcontact');
});

Route::get('/newcompany', function () {
    return view('edit.newcompany');
});

Route::get('/detailcontact', function () {
    return view('contacts.detailcontact');
});

Route::get('/detailcompany', function () {
    return view('companies.detailcompany');
});

Route::get('/detailinvoice', function () {
    return view('invoices.detailinvoice');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';