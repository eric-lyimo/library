<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(BooksController::class)->middleware('auth:sanctum')->group(function(){
    Route::get('books','books');
    Route::get('books/popular','popular');
});

Route::controller(AuthController::class)->group(function(){
    Route::post('/auth/register', 'createUser');
    Route::post('/auth/login', 'loginUser');
});