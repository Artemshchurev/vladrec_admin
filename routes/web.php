<?php

use App\Http\Controllers\BarriersController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\DemoBarriersController;
use App\Http\Controllers\HousesController;
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

    Route::get('/demo-barriers/{id}', [DemoBarriersController::class, 'show'])
        ->name('demo-barriers.show');

    Route::put('/demo-barriers/{id}', [DemoBarriersController::class, 'update']);

    Route::get('/camera/create', [CameraController::class, 'create'])
        ->name('camera.create');

    Route::post('/camera/create', [CameraController::class, 'store']);

    Route::get('/camera/{id}', [CameraController::class, 'show'])
        ->name('camera.show');

    Route::put('/camera/{id}', [CameraController::class, 'update']);

    Route::delete('/camera/{id}', [CameraController::class, 'destroy']);
});

Route::get('/dashboard', [CameraController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__.'/auth.php';
