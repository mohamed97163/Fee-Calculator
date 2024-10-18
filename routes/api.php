<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeePercentageController;
use App\Http\Controllers\FeePresetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ThresholdController;
use Illuminate\Support\Facades\Route;



Route::middleware(['lang'])->group(function() {
    Route::prefix('auth')->group(function() {
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
    });
});

Route::post('/feePresets' ,[FeePresetController::class ,'store']);
Route::get('/feePresets', [FeePresetController::class, 'index']);
Route::get('/feePresets/{feePreset}', [FeePresetController::class, 'show']);
Route::patch('/incoming-types/{feePreset}', [FeePresetController::class, 'update']);
Route::delete('/feePresets/{feePreset}', [FeePresetController::class, 'destroy']);
 

Route::get('/feePercentages', [FeePercentageController::class, 'index']);
Route::get('/feePercentages/{feePercentage}', [FeePercentageController::class, 'show']);
Route::post('/feePercentages', [FeePercentageController::class, 'store']);
Route::patch('/feePercentages/{feePercentage}', [FeePercentageController::class, 'update']);
Route::delete('/feePercentages/{feePercentage}', [FeePercentageController::class, 'destroy']);


Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{service}', [ServiceController::class, 'show']);
Route::post('/services', [ServiceController::class, 'store']);
Route::patch('/services/{service}', [ServiceController::class, 'update']);
Route::delete('/services/{service}', [ServiceController::class, 'destroy']);


Route::get('/thresholds', [ThresholdController::class, 'index']);
Route::get('/thresholds/{threshold}', [ThresholdController::class, 'show']);
Route::post('/thresholds', [ThresholdController::class, 'store']);
Route::patch('/thresholds/{threshold}', [ThresholdController::class, 'update']);
Route::delete('/thresholds/{threshold}', [ThresholdController::class, 'destroy']);
