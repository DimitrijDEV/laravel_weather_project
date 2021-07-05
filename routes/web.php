<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', App\Http\Controllers\WelcomeController::class)->name('welcome');

Route::name('auth.')->group(function () {
    //Return a login and register page
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::get('register', [RegisterController::class, 'index'])->name('register');

    //Check a user in the database
    Route::post('login/check', [LoginController::class, 'login'])->name('check-user');
    
    //Create a new user
    Route::post('register/create', [RegisterController::class, 'register'])->name('create-user');
});