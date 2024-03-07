<?php

use App\Http\Controllers\Admin\BankAccontController;
use App\Http\Controllers\Admin\BankAccountController as AdminBankAccountController;
use App\Http\Controllers\Admin\PermisionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Customer\UserController as CustomerUserController;
use App\Http\Controllers\Guest\BankAccountController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\UserController;
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


// open account
Route::get('/bank_accounts/open', [BankAccountController::class, 'open'])->name('open');
Route::post('/bank_accounts/open', [BankAccountController::class, 'perform'])->name('perform');

// Customer
Route::middleware('auth')
    ->group(function () {
        Route::get('/logout', [CustomerUserController::class, 'logout'])->name('logout');
    });

// Admin
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Users
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');

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
        Route::get('/bank_accounts', [AdminBankAccountController::class, 'index'])->name('bank_accounts.index');
        Route::get('/bank_accounts/create', [AdminBankAccountController::class, 'create'])->name('bank_accounts.create');
        Route::post('/bank_accounts', [AdminBankAccountController::class, 'store'])->name('bank_accounts.store');
        Route::get('/bank_accounts/{id}', [AdminBankAccountController::class, 'edit'])->name('bank_accounts.edit');
        Route::put('/bank_accounts/{id}', [AdminBankAccountController::class, 'update'])->name('bank_accounts.update');
        Route::delete('/bank_accounts/{id}', [AdminBankAccountController::class, 'destroy'])->name('bank_accounts.destroy');
    });
