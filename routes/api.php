<?php

use App\Http\Controllers\Api\DealerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::post('/login', [AuthController::class, 'login']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| MST DEALER (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->prefix('dealer')->group(function () {

    Route::get('/', [DealerController::class, 'index']);      // GET /api/dealer
    Route::get('/{id}', [DealerController::class, 'show']);   // GET /api/dealer/{id}

    // Route::post('/', [MstDealerController::class, 'store']);
    // Route::put('/{id}', [MstDealerController::class, 'update']);
    // Route::delete('/{id}', [MstDealerController::class, 'destroy']);
});