<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/register',function(){return view('auth.register');});
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/login',function(){return view('auth.login');});
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');