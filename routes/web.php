<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

Auth::routes();
Route::get('/vouchers', [App\Http\Controllers\VoucherController::class, 'index'])->name('voucher');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
