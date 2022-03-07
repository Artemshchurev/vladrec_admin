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
Route::get('/camera', [App\Http\Controllers\Api\CameraController::class, 'index']);

Route::get('/camera/common', [App\Http\Controllers\Api\CameraController::class, 'common']);

Route::get('/demo-barrier', [App\Http\Controllers\Api\DemoBarriersController::class, 'index']);

Route::get('/demo-barrier/open', [App\Http\Controllers\Api\DemoBarriersController::class, 'open']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
