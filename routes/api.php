<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/home',[ApiController::class,'home']);
Route::get('/categories',[ApiController::class,'categories']);
Route::get('/category/{id}',[ApiController::class,'category']);
Route::get('/items',[ApiController::class,'items']);
Route::get('/item/{id}',[ApiController::class,'item']);
Route::post('/book',[ApiController::class,'book']);
Route::get('/date',[ApiController::class,'carbon']);


