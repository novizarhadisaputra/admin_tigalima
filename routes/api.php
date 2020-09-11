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
Route::post('auth/login', 'Api\AuthController@login')->name('users.login');
Route::post('verification-account', 'Api\AuthController@userVerification')->name('users.verification');
Route::post('resend-verification', 'Api\AuthController@resendVerification')->name('users.resend.verification');
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('users/me', 'Api\UserController@me')->name('users.me');
    Route::apiResource('users', 'Api\UserController');
    Route::delete('users/{id}/force', 'Api\UserController@forceDestroy')->name('users.force.destroy');
    Route::apiResource('articles', 'Api\ArticleController');
    Route::post('auth/logout', 'Api\AuthController@logout');

    Route::apiResource('roles', 'Api\RoleController');
    Route::apiResource('permissions', 'Api\PermissionController');

    Route::post('assign-role', 'Api\RolePermissionController@assignRole')->name('users.added.role');
    Route::delete('delete-role', 'Api\RolePermissionController@removeRole')->name('users.deleted.role');
    Route::put('update-role', 'Api\RolePermissionController@syncRoles')->name('users.updated.role');
    // Route::get('list-user-role', '')
});
