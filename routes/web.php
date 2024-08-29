<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Password\PasswordController;
use App\Http\Controllers\Password\PasswordGenratorController;

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


// Route::get('password/genrate', PasswordGenratorController::class)->name('genrate');
Route::view('/', 'index')->name('welcome');

Route::get('login', [LoginController::class,'index']);
Route::post('login',[LoginController::class,'authenticate'] )->name('login');

Route::get('register', [RegisterController::class,'index']);
Route::post('register',[RegisterController::class,'store'] )->name('register');

Route::group(['middleware' => 'auth'], function () {

    // password route
    Route::resource('password', PasswordController::class);
    // Route::get('password/generate',PasswordGenratorController::class)->name('password.generate');
    Route::get('password/generate', [PasswordController::class,'generate_view'])->name('generate');

    // logout route
    Route::delete('logout',LogoutController::class )->name('logout');

});
