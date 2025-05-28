<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Hash;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('roles', RolesController::class);