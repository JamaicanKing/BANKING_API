<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('transactions',[ 'App\Http\Controllers\Api\TransactionController', 'store']);
Route::get('transactions/{customerId}',[ 'App\Http\Controllers\Api\TransactionController', 'index']);
Route::get('transactions/{accountNumber}/history',[ 'App\Http\Controllers\Api\TransactionController', 'accountTransactionHistory']);
Route::get('accounts/{customerId}',[ 'App\Http\Controllers\Api\AccountController', 'index']);
Route::get('accounts/{accountNumber}/details',[ 'App\Http\Controllers\Api\AccountController', 'show']);