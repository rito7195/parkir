<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParkirController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\KonfigurasiKapasitasController;
use App\Http\Controllers\KonfigurasiTarifController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use Illuminate\Auth\Events\Login;

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

Route::group(['middleware' => ['guest:admin', 'guest:operator']], function() {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'authenticate']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::group(['middleware' => ['auth:admin', 'auth:operator']], function() {
    
// });
Route::resource('/parkir', ParkirController::class)->middleware('auth:operator');
Route::resource('/jenis_kendaraan', JenisKendaraanController::class)->middleware('auth:admin');
Route::resource('/kapasitas', KonfigurasiKapasitasController::class)->middleware('auth:admin');
Route::resource('/tarif', KonfigurasiTarifController::class)->middleware('auth:admin');
Route::resource('/admin', AdminController::class)->middleware('auth:admin');
Route::resource('/operator', OperatorController::class)->middleware('auth:admin');