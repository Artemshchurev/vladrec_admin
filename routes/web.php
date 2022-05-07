<?php

use App\Http\Controllers\BarriersController;
use App\Http\Controllers\CamerasController;
use App\Http\Controllers\HouseApplicationsController;
use App\Http\Controllers\HouseDevicesController;
use App\Http\Controllers\PublicCamerasController;
use App\Http\Controllers\DemoBarriersController;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\SpecialServicesController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::group(['middleware' => ['auth', 'role:god']], function () {
    Route::get('/barriers', [BarriersController::class, 'index'])
        ->name('barriers');
    Route::get('/barriers/{id}', [BarriersController::class, 'show'])
        ->name('barriers.show');
    Route::put('/barriers/{id}', [BarriersController::class, 'update']);
    Route::delete('/barriers/{id}', [BarriersController::class, 'destroy']);

    Route::get('/houses', [HousesController::class, 'index'])
        ->name('houses');

    Route::get('/houses/create', [HousesController::class, 'create'])
        ->name('houses.create');

    Route::post('/houses/create', [HousesController::class, 'store']);
    Route::get('/houses/{id}', [HousesController::class, 'show'])
        ->name('houses.show');
    Route::put('/houses/{id}', [HousesController::class, 'update']);
    Route::delete('/houses/{id}', [HousesController::class, 'destroy']);
    Route::get('/house/{id}/barrier-create', [HousesController::class, 'barrierCreate'])
        ->name('houses.barrier-create');
    Route::post('/house/{id}/barrier-create', [HousesController::class, 'barrierStore']);
    Route::get('/house/{id}/camera-create', [HousesController::class, 'cameraCreate'])
        ->name('houses.camera-create');
    Route::post('/house/{id}/camera-create', [HousesController::class, 'cameraStore']);
    Route::get('/house/{id}/user-create', [HousesController::class, 'userCreate'])
        ->name('houses.user-create');
    Route::post('/house/{id}/user-create', [HousesController::class, 'userStore']);

    Route::get('/demo-barriers/{id}', [DemoBarriersController::class, 'show'])
        ->name('demo-barriers.show');
    Route::put('/demo-barriers/{id}', [DemoBarriersController::class, 'update']);

    Route::get('/public-camera/create', [PublicCamerasController::class, 'create'])
        ->name('public-camera.create');
    Route::post('/public-camera/create', [PublicCamerasController::class, 'store']);
    Route::get('/public-camera/{id}', [PublicCamerasController::class, 'show'])
        ->name('public-camera.show');
    Route::put('/public-camera/{id}', [PublicCamerasController::class, 'update']);
    Route::delete('/public-camera/{id}', [PublicCamerasController::class, 'destroy']);

    Route::get('/camera/{id}', [CamerasController::class, 'show'])
        ->name('cameras.show');
    Route::put('/camera/{id}', [CamerasController::class, 'update']);
    Route::delete('/camera/{id}', [CamerasController::class, 'destroy']);

    Route::put('/users/{id}', [UsersController::class, 'update']);

    Route::get('/special-services', [SpecialServicesController::class, 'index'])
        ->name('special-services');
    Route::get('/special-services/create', [SpecialServicesController::class, 'create'])
        ->name('special-services.create');
    Route::post('/special-services/create', [SpecialServicesController::class, 'store']);
    Route::get('/special-services/{id}', [SpecialServicesController::class, 'show'])
        ->name('special-services.show');
    Route::put('/special-services/{id}', [SpecialServicesController::class, 'update']);
    Route::delete('/special-services/{id}', [SpecialServicesController::class, 'destroy']);
});

Route::group(['middleware' => ['auth', 'role:god|house-admin|special-service']], function () {
    Route::get('/dashboard', [PublicCamerasController::class, 'index'])
        ->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:special-service']], function () {
    Route::get('/house-devices/{id}', [HouseDevicesController::class, 'index'])
        ->name('house-device');
});

Route::group(['middleware' => ['auth', 'role:god|house-admin']], function () {
    Route::get('/houses/{id}', [HousesController::class, 'show'])
        ->name('houses.show');
    Route::get('/users/{id}', [UsersController::class, 'show'])
        ->name('users.show');
});

Route::group(['middleware' => ['auth', 'role:house-admin']], function () {
    Route::get('/house-applications', [HouseApplicationsController::class, 'index'])
        ->name('house-applications');

    Route::put('/house-applications', [HouseApplicationsController::class, 'approve']);
    Route::delete('/house-applications', [HouseApplicationsController::class, 'refuse']);

    Route::get('/statistic', [StatisticsController::class, 'index'])
        ->name('statistic');
});


require __DIR__.'/auth.php';
