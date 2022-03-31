<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
Route::middleware('guest')->group(fn()=>
    Route::get('/login', [UserController::class, 'login'])->name('login'),
    Route::post('/login', [UserController::class, 'loginProsesing'])->name('login-proses'),
    Route::get('/register', [UserController::class, 'register']),
    Route::post('/register', [UserController::class, 'registerProsessing'])->name('register-proses')
);
Route::middleware('auth')->group(fn()=>
    Route::get('/', [HomeController::class, 'index']),
    Route::post('/', [OrderController::class, 'add'])->name('add_ordering'),
    Route::get('/logout', [UserController::class, 'logout']),
    Route::get('/payment_complete/{id}', [OrderController::class, 'payment_complete']),
    Route::get('/remove/{id}', [OrderController::class, 'remove'])
);

