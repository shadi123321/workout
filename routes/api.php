<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\infoController;

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
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::middleware(['auth:sanctum'])->group(function()
{
    Route::delete('/logout',[AuthController::class,'logout']);
   Route::post('/select_gender',[infoController::class,'select_gender']);
   Route::post('/select_goal',[infoController::class,'select_goal']);
   Route::post('/details',[infoController::class,'details']);
   Route::post('/defaultexersice',[infoController::class,'defaultexersice']);
   Route::get('/getdefault',[infoController::class,'getdefault']);
   Route::get('/anotherMethod',[infoController::class,'anotherMethod']);
   Route::get('/getcalories/{id}',[infoController::class,'getcalories']);

   

});

Route::get('/relation',[infoController::class,'relation']);
Route::get('/relation2',[infoController::class,'relation2']);
Route::get('/getinfo',[infoController::class,'getinfo']);
Route::get('/testRelation',[infoController::class,'testRelation']);
Route::get('/date',[infoController::class,'date']);
Route::get('/n', function () {
    return 's';

});

