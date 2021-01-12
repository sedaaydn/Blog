<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('post', PostController::class);
Route::resource('comment', CommentController::class);
Route::resource('user', UserController::class);

Route::post('commentStore/{id}', [CommentController::class, 'commentStore'])->name('commentStore');
Route::get('/userPosts', [UserController::class, 'user_posts'])->name('userPosts');

Route::get('/home', [HomeController::class, 'index'])->name('home');

