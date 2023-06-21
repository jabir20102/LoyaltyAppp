<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[CustomerController::class,'welcome'])->name('welcome-page');

Route::get('customers/search', [CustomerController::class, 'search'])->name('customers.search');



Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('/customers', [CustomerController::class,'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class,'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class,'store'])->name('customers.store');
Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::post('customers/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');



// Route::resource('/customers', CustomerController::class);