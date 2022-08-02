<?php

use App\Http\Controllers\ApiDishesController;
use App\Http\Controllers\ApiMenusController;
use App\Http\Controllers\ApiOrdersController;
use App\Http\Controllers\ApiRestourantsController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'v1'],function (){
    Route::resource('/restourants', ApiRestourantsController::class);
    Route::resource('/menu', ApiMenusController::class);
    Route::resource('/dishes', ApiDishesController::class);
    Route::resource('/orders', ApiOrdersController::class);
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    
    });
    
});




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
