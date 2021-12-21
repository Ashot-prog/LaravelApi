<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FrontController;

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

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('update', [FrontController::class, 'update']);
Route::get('index', [FrontController::class, 'index']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('user-details', [UserController::class, 'userDetails']);
});
