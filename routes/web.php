<?php

use App\Http\Controllers\PostController;
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


Auth::routes();


Route::group(["middleware" => "auth"], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    #POST
    Route::get('/create/post',[PostController::class,'create'])->name('post.create');
    Route::post('/store/post',[PostController::class,'store'])->name('post.store');
    Route::get('/show/post/{id}',[PostController::class,'show'])->name('post.show');
    Route::get('/edit/post/{id}',[PostController::class,'edit'])->name('post.edit');
    Route::patch('/update/post/{id}',[PostController::class,'update'])->name('post.update');



});
