<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('talles', App\Http\Controllers\TalleController::class)->middleware('auth','verified');
Route::resource('marcas', App\Http\Controllers\MarcaController::class)->middleware('auth','verified');
Route::resource('tipos', App\Http\Controllers\TipoController::class)->middleware('auth','verified');
Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware('auth','verified');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
