<?php

use App\Http\Controllers\BankAccontController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/bank_accounts', [BankAccontController::class, 'index'])->name('bank_accounts.index');
Route::get('/bank_accounts/create', [BankAccontController::class, 'create'])->name('bank_accounts.create');
Route::post('/bank_accounts', [BankAccontController::class, 'store'])->name('bank_accounts.store');
Route::get('/bank_accounts/{id}', [BankAccontController::class, 'edit'])->name('bank_accounts.edit');
Route::put('/bank_accounts/{id}', [BankAccontController::class, 'update'])->name('bank_accounts.update');