<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ReservationController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();



Route::resource('/admin/categories', CategoryController::class)->middleware('auth');
Route::resource('/admin/items', ItemController::class)->middleware('auth');
Route::resource('/admin/tables', TableController::class)->middleware('auth');
Route::resource('/admin/reservation', ReservationController::class)->middleware('auth');
Route::resource('/user', UserController::class);
Route::get('/admin',function(){
    return view('theme');
})->middleware('auth');

Route::get('/book',function(){
    return view('user.book');
})->name('book');

Route::get('/about',function(){
    return view('user.about');
})->name('about');
Route::post('/store',[UserController::class,'store']);

Route::get('/menu',[UserController::class,'showcategories'])->name('menu');
//Route::get('/show/{id}',[UserController::class,'show'])->name('show');
Route::get('/',[UserController::class,'index']
)->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
