<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
    Route::delete('/delete/post/{id}',[PostController::class,'destroy'])->name('post.delete');

    #comment
    Route::post('/comment/store/{post_id}',[CommentController::class,'store'])->name('comment.store');
    Route::delete('/comment/delete/{post_id}',[CommentController::class,'destroy'])->name('comment.delete');

    #prfofile
    Route::get('/profile/{id}/show',[ProfileController::class,'show'])->name('profile.show');
    Route::get('/profile/{id}/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile/update',[ProfileController::class,'update'])->name('profile.update');



});
