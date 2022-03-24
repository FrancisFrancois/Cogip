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

Route::middleware((['auth', 'role:admin']))->group(function () {

    Route::get('/editcompany/{id}', [CompanyController::class, 'edit'])
        ->where(['id' => '[0-9]+']);

    Route::put('/editcompany/update/{id}', [CompanyController::class, 'update'])
        ->where(['id' => '[0-9]+']);

    Route::delete('/editcompany/delete/{id}', [CompanyController::class, 'destroy'])
        ->where(['id' => '[0-9]+']);

    Route::get('/editcontact/{id}', [ContactController::class, 'edit'])
        ->where(['id' => '[0-9]+']);

    Route::put('/editcontact/update/{id}', [ContactController::class, 'update'])
        ->where(['id' => '[0-9]+']);

    Route::delete('/editcontact/delete/{id}', [ContactController::class, 'destroy'])
        ->where(['id' => '[0-9]+']);

    Route::get('/editinvoice/{id}', [InvoiceController::class, 'edit'])
        ->where(['id' => '[0-9]+']);

    Route::put('/editinvoice/update/{id}', [InvoiceController::class, 'update'])
        ->where(['id' => '[0-9]+']);

    Route::delete('/editinvoice/delete/{id}', [InvoiceController::class, 'destroy'])
        ->where(['id' => '[0-9]+']);
});


Route::middleware((['auth', 'role:editor']))->group(function () {



    Route::get('/companies', [CompanyController::class, 'index']);

    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/detailcompany/{id}', [CompanyController::class, 'show'])
        ->where(['id' => '[0-9]+']);

    Route::get('/newcompany', [CompanyController::class, 'create']);

    Route::post('/newcompany', [CompanyController::class, 'store']);

    Route::get('/editcompany/{id}', [CompanyController::class, 'edit'])
        ->where(['id' => '[0-9]+']);

    Route::put('/editcompany/update/{id}', [CompanyController::class, 'update'])
        ->where(['id' => '[0-9]+']);

    Route::delete('/editcompany/delete/{id}', [CompanyController::class, 'destroy'])
        ->where(['id' => '[0-9]+']);

    Route::get('/contacts', [ContactController::class, 'index']);

    Route::get('/detailcontact/{id}', [ContactController::class, 'show'])
        ->where(['id' => '[0-9]+']);

    Route::get('/newcontact', [ContactController::class, 'create']);

    Route::post('/newcontact', [ContactController::class, 'store']);

    Route::get('/editcontact/{id}', [ContactController::class, 'edit'])
        ->where(['id' => '[0-9]+']);

    Route::put('/editcontact/update/{id}', [ContactController::class, 'update'])
        ->where(['id' => '[0-9]+']);

    Route::delete('/editcontact/delete/{id}', [ContactController::class, 'destroy'])
        ->where(['id' => '[0-9]+']);

    Route::get('/invoices', [InvoiceController::class, 'index']);

    Route::get('/detailinvoice/{id}', [InvoiceController::class, 'show'])
        ->where(['id' => '[0-9]+']);

    Route::get('/newinvoice', [InvoiceController::class, 'create']);

    Route::post('/newinvoice', [InvoiceController::class, 'store']);
});





require __DIR__ . '/auth.php';
