<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanningsController;
use App\Http\Controllers\PointingController;
use App\Http\Controllers\SubclassController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors'])->group(function () {
    Route::get('/dashboards', [DashboardController::class, 'index']);
    Route::get('/plannings', [PlanningsController::class, 'get']);
    Route::get('/plannings/{planningId}', [PlanningsController::class, 'show']);
    Route::get('/plannings/filter/{classId}', [PlanningsController::class, 'filter']);
    Route::get('/subclasses', [SubclassController::class, 'get']);
    Route::get('/subclasses/{classId}', [SubclassController::class, 'show']);
    Route::get('/classes', [ClassController::class, 'get']);
});
