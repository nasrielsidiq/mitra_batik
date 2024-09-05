<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
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
    Route::middleware('admin')->group(function() {
        Route::get('/admin', [Controller::class, 'admin']);
    });

    Route::get('/', [Controller::class, 'home']);
    Route::get('/detail/{id}', [Controller::class, 'detail']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/order', [Controller::class, 'viewOrder']);
    Route::get('/order/{id}', [OrderController::class, 'order']);
    Route::get('/order/update/{id}', [OrderController::class, 'orderUpdate']);
    Route::get('/transaksi', [Controller::class, 'viewTransaction']);
    Route::post('/transaksi', [ProdukController::class, 'addTransaction']);
    Route::get('/ordered', [OrderController::class, 'getOrder']);
});
