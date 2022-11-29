<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\KategoriController;

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
Route::middleware(['auth'])->group(function () {
    Route::resource('posting', PostingController::class);
    Route::get('delpos/{posting}', [PostingController::class, 'destroy']);
    
    Route::resource('produk', ProdukController::class);
    Route::get('delpro/{produk}', [ProdukController::class, 'destroy']);
    
    Route::resource('kategori', KategoriController::class);
    Route::get('delkat/{kategori}', [KategoriController::class, 'destroy']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('kelpro/{produk}', [ProdukController::class, 'akses']);
    Route::get('kelpos/{posting}', [PostingController::class, 'akses']);
    
    Route::resource('user', UserController::class);
    Route::get('akses/{user}', [UserController::class, 'update']);
});

Route::get('/', [PostingController::class, 'home']);
Route::resource('rekomendasi', RecController::class);
Route::get('detail/{posting}', [PostingController::class, 'show']);




Auth::routes();
