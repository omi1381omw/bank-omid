<?php

use App\Http\Controllers\BankAccontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisionController;
use App\Http\Controllers\RoleController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'auth'])->name('auth');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerAuth'])->name('users.registerAuth');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/register', [UserController::class, 'register'])->name('register');

Route::middleware('auth')
    ->group(function () {

        // Users
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // Permision
        Route::get('/permisions/{id}', [PermisionController::class, 'show'])->name('permisions.show');
        Route::post('/permisions/{id}', [PermisionController::class, 'store'])->name('permisions.store');
        Route::delete('/permisions/{id}', [PermisionController::class, 'destroy'])->name('permisions.destroy');

        // Roles
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

        // Bank accounts
        Route::get('/bank_accounts', [BankAccontController::class, 'index'])->name('bank_accounts.index');
        Route::get('/bank_accounts/create', [BankAccontController::class, 'create'])->name('bank_accounts.create');
        Route::post('/bank_accounts', [BankAccontController::class, 'store'])->name('bank_accounts.store');
        Route::get('/bank_accounts/{id}', [BankAccontController::class, 'edit'])->name('bank_accounts.edit');
        Route::put('/bank_accounts/{id}', [BankAccontController::class, 'update'])->name('bank_accounts.update');
        Route::delete('/bank_accounts/{id}', [BankAccontController::class, 'destroy'])->name('bank_accounts.destroy');
    });
