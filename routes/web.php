<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;
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

Route::get('/',[DashboardController::class,'index'])->name('frontend');


Route::get('/delete-category/{id}',[CategoryController::class,'destroy']);
Route::get('/delete-tags/{id}',[CategoryController::class,'destroy']);
Route::get('/delete-post/{id}',[PostController::class,'destroy']);

// Route::get('/dashboard/post-list', [DashboardController::class,'all_post']);



Route::resource('/dashboard/post', PostController::class);
Route::resource('/dashboard/category', CategoryController::class);
Route::resource('/dashboard/tag', TagController::class);





Route::resource('/dashboard', DashboardController::class);

