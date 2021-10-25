<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\admin\PlanController;


use App\Http\Controllers\AuthController;
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

// procted routes
Route::group(['middleware' => 'auth'], function(){
    Route::resource('/dashboard/post', PostController::class);
    Route::resource('/dashboard/category', CategoryController::class);
    Route::resource('/dashboard/tag', TagController::class);
    Route::resource('/dashboard/feature', FeatureController::class);
    Route::resource('/dashboard/plan', PlanController::class);
    
    
    
    Route::get('/delete-category/{id}',[CategoryController::class,'destroy']);
    Route::get('/delete-tags/{id}',[CategoryController::class,'destroy']);
    Route::get('/delete-post/{id}',[PostController::class,'destroy']);
    Route::get('/delete-feature/{id}',[FeatureController::class,'destroy']);
    
    
    Route::resource('/dashboard', DashboardController::class);
});


Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/auth-login',[AuthController::class,'auth_login'])->name('login.custom');
Route::get('/registration',[AuthController::class,'registration']);
Route::get('/logout',[AuthController::class,'logout']);





