<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TempatMakanController;
use App\Http\Controllers\UlasanController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('tempat-makan', TempatMakanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('kategori', KategoriController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('promo', PromoController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('ulasan', UlasanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);



Route::middleware(['auth'])->group(function () {
    Route::resource('tempat-makan', TempatMakanController::class)->except(['index', 'show']);

    Route::resource('kategori', KategoriController::class)->except(['index', 'show']);

    Route::resource('promo', PromoController::class)->except(['index', 'show']);

    Route::resource('ulasan', UlasanController::class)->only(['edit', 'update', 'destroy']);
});
