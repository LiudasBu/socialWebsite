<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);
Route::get('/p/{post}/edit', [App\Http\Controllers\PostsController::class, 'edit']);
Route::put('/p/{post}', [App\Http\Controllers\PostsController::class, 'update']);

Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/{post}/delete', [\App\Http\Controllers\PostsController::class, 'destroy'])->name('post.delete');

Route::get('profile/{user}', [\App\Http\Controllers\ProfilesController::class, 'index']);

Route::get('words/{query}', [\App\Http\Controllers\WordApiController::class, 'index']);