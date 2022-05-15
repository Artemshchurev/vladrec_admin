<?php

use App\Http\Controllers\Api\CameraController;
use App\Http\Controllers\Api\DemoBarriersController;
use App\Http\Controllers\Api\HouseDevicesController;
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
Route::get('/camera', [CameraController::class, 'index']);

Route::get('/camera/common', [CameraController::class, 'common']);

Route::get('/demo-barrier', [DemoBarriersController::class, 'index']);

Route::get('/demo-barrier/open', [DemoBarriersController::class, 'open']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/house-devices/{id}', [HouseDevicesController::class, 'open'])
    ->middleware('auth:sanctum');
