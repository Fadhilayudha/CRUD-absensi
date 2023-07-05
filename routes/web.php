<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\ErrorController;

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

Route::middleware('CekRole:admin')->group(function(){
    Route::resource('rombel', RombelController::class);
});


Route::middleware('isGuest')->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register/input', [LoginController::class, 'registerAccount'])->name('register.input');
});

Route::middleware('isLogin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('student', StudentController::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::resource('error', ErrorController::class);




