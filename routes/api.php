<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//
//Route::get('categories',[CategoryController::class,'index']);
//Route::post('categories/store',[CategoryController::class,'store']);


Route::post('register',[RegisterController::class,'register']);
Route::post('login',[RegisterController::class,'login']);


  Route::middleware(['auth:sanctum'])->group(function (){
       Route::get('logout',[RegisterController::class,'logout']);
       Route::apiresource('categories',CategoryController::class);
});

