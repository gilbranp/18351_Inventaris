<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[DashboardController::class,'index'])->middleware('auth');
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/datauser', function () {
    return view('dashboard.datapengguna');
});
Route::get('/databarang', function () {
    return view('dashboard.databarang');
});
Route::get('/peminjaman', function () {
    return view('dashboard.peminjaman');
});
Route::get('/ruangan', function () {
    return view('dashboard.ruangan');
});
