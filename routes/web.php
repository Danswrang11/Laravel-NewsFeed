<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});



//Admin Routes
Route::prefix('Admin')->group(function(){
    Route::get('/Login', [AdminController::class, 'loginform']);
    Route::post('/Login', [AdminController::class, 'login'])->name('login.submit');
    
    //For Dashborad
    Route::get('/Dashboard', [AdminController::class, 'dashboard'])->name('Admin.dashboard')->middleware(AdminMiddleware::class);

    //For Post
    Route::prefix('/Post')->group(function(){
        Route::get('/Form', [PostController::class, 'form'])->name('Post.form');
        Route::post('/Form', [PostController::class, 'store'])->name('Post.store');
        Route::get('/List', [PostController::class, 'list'])->name('Post.list');
        //Editing & Delete Category
        Route::get('/{id}/Edit', [PostController::class, 'edit'])->name('Post.edit');
        Route::put('/Post/{id}', [PostController::class, 'update'])->name('Post.update');
        Route::delete('/Post/{id}', [PostController::class, 'delete'])->name('Post.delete');
    })->middleware(AdminMiddleware::class);

    //For Category
    Route::prefix('/Category')->group(function(){
        Route::get('/Form', [CategoryController::class, 'form'])->name('Category.form');
        Route::post('/Form', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/List', [CategoryController::class, 'list'])->name('Category.list');    
        //Editing & Delete Category
        Route::get('/{id}/Edit', [CategoryController::class, 'edit'])->name('Category.edit');
        Route::put('/Category/{id}', [CategoryController::class, 'update'])->name('Category.update');
        Route::delete('/Category/{id}', [CategoryController::class, 'delete'])->name('Category.delete');
    })->middleware(AdminMiddleware::class);

    //For Tags
    Route::prefix('/Tag')->group(function(){
        Route::get('/Form', [TagController::class, 'form'])->name('Tag.form');
        Route::get('/List', [TagController::class, 'list'])->name('Tag.list');
        Route::post('/Form', [TagController::class, 'store'])->name('tags.store');
        //Editing & Delete Tags
        Route::get('/{id}/Edit', [TagController::class, 'edit'])->name('tags.edit');
        Route::put('/Tags/{id}', [TagController::class, 'update'])->name('tags.update');
        Route::delete('/Tags/{id}', [TagController::class, 'delete'])->name('tags.delete');
    })->middleware(AdminMiddleware::class);
});

//User Routes
Route::prefix('User')->group(function(){
    Route::get('/Login', [UserController::class, 'login']);
});