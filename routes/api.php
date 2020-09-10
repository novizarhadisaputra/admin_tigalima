<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('auth/login', 'Api\AuthController@login');
Route::post('verification-account', 'Api\AuthController@userVerification');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('users/me', 'Api\UserController@me')->name('users.me');
    Route::delete('users/{id}/force', 'Api\UserController@forceDestroy');
    Route::apiResource('users', 'Api\UserController');
    Route::delete('users/{id}/force', 'Api\UserController@forceDestroy')->name('users.force.destroy');
    Route::apiResource('articles', 'Api\ArticleController');
    Route::post('auth/logout', 'Api\AuthController@logout');
});
