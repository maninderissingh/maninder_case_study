<?php
//use App\Http\Controllers\UserController;

// use App\Http\Controllers\UserController;
// use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('user', UserController::class);

Route::post('auth/login', 'AuthController@login')->name('auth.login');

Route::group(['middleware' => 'authapi'], function()
{
    
    Route::apiResource('product', ProductsController::class);
});