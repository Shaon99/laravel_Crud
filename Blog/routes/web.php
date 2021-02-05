<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\postcontroller;



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


Route::get('/',[HomeController::Class,'index']);
Route::get('about',[HomeController::Class,'about'])->name('about');
Route::get('contact',[HomeController::Class,'contact'])->name('contact');
Route::get('add/category',[HomeController::Class,'addca'])->name('add.category');
Route::post('store/category',[HomeController::Class,'store'])->name('store.category');
Route::get('all/category',[HomeController::Class,'all'])->name('all.category');
Route::get('view/category/{id}',[HomeController::Class,'view']);
Route::get('delete/category/{id}',[HomeController::Class,'delete']);
Route::get('edit/category/{id}',[HomeController::Class,'edit']);
Route::post('update/category/{id}',[HomeController::Class,'updateca']);

//post crud

Route::get('write/post',[postcontroller::Class,'write'])->name('write');
Route::post('store/post',[postcontroller::Class,'storepost'])->name('store.post');
Route::get('all/post',[postcontroller::Class,'allpost'])->name('all.post');
Route::get('view/post/{id}',[postcontroller::Class,'viewpost']);
Route::get('edit/post/{id}',[postcontroller::Class,'editpost']);
Route::post('update/post/{id}',[postcontroller::Class,'updatepost']);
Route::get('delete/post/{id}',[postcontroller::Class,'deletepost']);



