<?php

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');
    Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [\App\Http\Controllers\Api\AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [\App\Http\Controllers\Api\AuthController::class, 'me'])->name('me');
});

Route::apiResource('specialties', App\Http\Controllers\Api\SpecialtyController::class)->middleware('api');
Route::apiResource('assigment_statuses', App\Http\Controllers\Api\AssigmentStatusController::class)->middleware('api');
Route::apiResource('users', App\Http\Controllers\Api\UserController::class)->middleware('api');
Route::apiResource('assigments', App\Http\Controllers\Api\AssigmentController::class)->middleware('api');
Route::put('assigments/{assigment_id}/assign_operator','App\Http\Controllers\Api\AssigmentController@assignOperator')->middleware('api');