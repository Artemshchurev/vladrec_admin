<?php

use App\Http\Controllers\CameraController;
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

Route::get('/dashboard', [CameraController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/camera/create', [CameraController::class, 'create'])
    ->middleware(['auth'])
    ->name('camera.create');

Route::post('/camera/create', [CameraController::class, 'store'])
    ->middleware(['auth']);

Route::get('/camera/{id}', [CameraController::class, 'show'])
    ->middleware(['auth'])
    ->name('camera.show');

Route::put('/camera/{id}', [CameraController::class, 'update'])
    ->middleware(['auth']);

Route::delete('/camera/{id}', [CameraController::class, 'destroy'])
    ->middleware(['auth']);

require __DIR__.'/auth.php';
