<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
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


Route::get('/', [AppController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);



Route::get('/companies', [CompanyController::class, 'index']);

Route::get('/detailcompany/{id}', [CompanyController::class, 'show'])
    ->where(['id' => '[0-9]+']);

Route::get('/newcompany', [CompanyController::class, 'create']);

Route::post('/newcompany', [CompanyController::class, 'store']);

Route::get('/editcompany/{id}', [CompanyController::class, 'edit'])
    ->where(['id' => '[0-9]+']);

Route::put('/editcompany/update/{id}', [CompanyController::class, 'update'])
    ->where(['id' => '[0-9]+']);

Route::delete('/companies/{id}', [CompaniesController::class, 'destroy'])
    ->where(['id' => '[0-9]+']);



Route::get('/invoices', [InvoiceController::class, 'index']);

Route::get('/detailinvoice/{id}', [InvoiceController::class, 'show'])
    ->where(['id' => '[0-9]+']);




Route::get('/contacts', [ContactController::class, 'index']);

Route::get('/detailcontact/{id}', [ContactController::class, 'show'])
    ->where(['id' => '[0-9]+']);

Route::get('/newcontact', [ContactController::class, 'create']);

Route::post('/newcontact', [ContactController::class, 'store']);








Route::get('/newinvoice', function () {
    return view('edit.newinvoice');
});
















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
