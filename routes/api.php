<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('jwt.auth')->group(function() {
    Route::apiResource('students', StudentController::class);
    Route::apiResources([
        'classes' => ClasseController::class,
        'teachers' => TeacherController::class,
        'subjects' => SubjectController::class
    ], [
        'except' => 'destroy'
    ]);

    Route::get('classes/{class}/students', [ClasseController::class, 'students']);
});
