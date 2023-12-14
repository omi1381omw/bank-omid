<?php

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

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/create', [UserController::class, 'create'])->name('create');
Route::post('/users', [UserController::class, 'store'])->name('store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('show');
Route::put('/users/{id}', [UserController::class, 'update'])->name('update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('destroy');