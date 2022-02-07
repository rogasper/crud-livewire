<?php

use App\Http\Controllers\CustomerController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/customer', [CustomerController::class, 'index'])->middleware('auth:sanctum')->name('customer-index');
Route::get('/customer/add', [CustomerController::class, 'create'])->middleware('auth:sanctum')->name('customer-create');
// Route::post('/customer/store', [CustomerController::class, 'store'])->middleware('auth:sanctum')->name('customer-store');
Route::get('/customer/{id}/delete', [CustomerController::class, 'destroy'])->middleware('auth:sanctum')->name('customer-delete');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->middleware('auth:sanctum')->name('customer-edit');
