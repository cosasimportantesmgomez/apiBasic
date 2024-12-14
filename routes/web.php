<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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

Route::prefix('backoffice')->group(function() {
    Route::get('management_products', [ProductsController::class, 'index']);
    Route::get('getProduct', [ProductsController::class, 'getProduct']);
    Route::get('deleteProduct', [ProductsController::class, 'deleteProduct']);
});
