<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanningsController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\StudentController;
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
    Route::get('/plannings/{schoolyearId}', [PlanningsController::class, 'get']);
    Route::get('/plannings/filter/{schoolyearId}/{classId}', [PlanningsController::class, 'filter']);
    Route::get('/subclasses', [SubclassController::class, 'get']);
    Route::get('/subclasses/{classId}', [SubclassController::class, 'show']);
    Route::get('/subclasses/students/{subclassId}/{schoolYearId}', [StudentController::class, 'getStudents']);
    Route::get('/classes', [ClassController::class, 'get']);
    Route::get('/presences/{planningId}', [PresenceController::class, 'get']);
    Route::post('/presences/save', [PresenceController::class, 'save']);
    Route::post('/presences/terminate', [PresenceController::class, 'terminate']);
    Route::get('/schoolyears', [StudentController::class, 'getSchoolYear']);
    Route::get('/charts/subject/remote/{subjectId}', [ChartController::class, 'get_planning_remote_hour']);
    Route::get('/charts/subject/remote/{subjectId}/{status}', [ChartController::class, 'get_planning_status_hour']);
    // Route::get('/charts/subject/status/{subjectId}', [ChartController::class, 'get_planning_remote_hour']);
});

