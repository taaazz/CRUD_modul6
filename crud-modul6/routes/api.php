<?php

use App\Http\Controllers\VehicleBrandController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vehicle', [VehicleBrandController::class, 'index']);
Route::get('/vehicle/{id}', [VehicleBrandController::class, 'show']);
Route::get('/vehicle-by-category/{category_id}', [VehicleBrandController::class, 'findByCategoryId']);
Route::get('/vehicle-with-category', [VehicleBrandController::class, 'indexWithCategory']);
Route::post('/vehicle', [VehicleBrandController::class, 'store']);
Route::put('/vehicle/{id}', [VehicleBrandController::class, 'update']);
Route::delete('/vehicle/{id}', [VehicleBrandController::class, 'destroy']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
