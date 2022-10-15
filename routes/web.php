<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Books;

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

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index');
    Route::get('/home','index')->name('home');
    Route::get('docs','docs')->name('docs');
});

Route::controller(BooksController::class)->group(function(){
    Route::get('books/list','index')->name('books.index');
    Route::get('books/create','create')->name('books.create');
    Route::post('books/store','store')->name('books.store');
    Route::post('books/update','update')->name('books.update');
    Route::get('books/destroy','destroy')->name('books.destroy');
    Route::get('books/likes','likes')->name('books.likes');
    Route::post('books/comments','comments')->name('books.comments');
    Route::get('books/favorites','favorites')->name('books.favorite');
});


Route::controller(LoginController::class)->group(function(){
    Route::get('login','showLoginForm')->name('login');
    Route::post('login','login')->name('login');
    Route::get('logout','logout')->name('logout');
});

Route::controller(UserController::class)->group(function(){
    Route::get('users/list','index')->name('users.index');
    Route::get('register','registration')->name('register');
    Route::post('register','register')->name('users.register');
    Route::get('user/destroy','destroy')->name('users.destroy');
    Route::post('user/update','update')->name('users.update');
});

Route::get('test',function(){
    $books =Books::with('likes','comments','favorites')->get();

    return $books[0]->favorites;
});