<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\InvitationController;
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

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->middleware(['auth', 'admin'])->name('admin.dashboard');

// Colocation routes
Route::resource('colocations', ColocationController::class)->middleware('auth');
Route::post('/colocations/{colocation}/cancel', [ColocationController::class, 'cancel'])->middleware('auth')->name('colocations.cancel');
Route::post('/colocations/{colocation}/leave', [ColocationController::class, 'leave'])->middleware('auth')->name('colocations.leave');

// Invitation routes
Route::get('/invitations/{token}/accept', [InvitationController::class, 'accept'])->name('invitations.accept');
Route::post('/invitations/{token}/accept', [InvitationController::class, 'processAccept'])->name('invitations.process');
Route::get('/invitations/{token}/reject', [InvitationController::class, 'reject'])->name('invitations.reject');
Route::get('/colocations/{colocation}/invitations', [InvitationController::class, 'index'])->middleware('auth')->name('invitations.index');
Route::get('/colocations/{colocation}/invitations/create', [InvitationController::class, 'create'])->middleware('auth')->name('invitations.create');
Route::post('/colocations/{colocation}/invitations', [InvitationController::class, 'store'])->middleware('auth')->name('invitations.store');
Route::delete('/invitations/{invitation}', [InvitationController::class, 'destroy'])->middleware('auth')->name('invitations.destroy');