<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenggunaController;
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

Route::middleware(['guest'])->group(function(){
    Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
    Route::post('/login',[LoginController::class,'authenticate']);
    
});
Route::post('/logout',[LoginController::class,'logout']);



Route::middleware(['auth'])->group(function(){
    Route::get('/',[DashboardController::class,'index']);
    Route::resource('/datauser',PenggunaController::class);
    Route::resource('/databarang', InventarisirController::class);
    Route::resource('/peminjaman',PeminjamanController::class);
});


// Route::get('/datauser', function () {
//     return view('dashboard.datapengguna');
// });


Route::get('/ruangan', function () {
    return view('dashboard.ruangan');
});
Route::get('/validasi', function () {
    return view('dashboard.validasi.index');
});
// Route::get('/edit', function () {
//     return view('dashboard.pengguna.edit');
// });
