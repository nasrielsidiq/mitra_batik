<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [Controller::class,'viewLogin']);
Route::post('/login', [AuthController::class,'login']);
Route::middleware('loginweb')->group(function () {
    Route::get('/', [Controller::class, 'home']);
    Route::get('/admin', [Controller::class, 'admin']);
    Route::get('/detail/{id}', [Controller::class, 'detail']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('transaksi/{id_item}', []);
});
