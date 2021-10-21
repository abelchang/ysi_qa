<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QaController;
use App\Http\Controllers\QsampleController;
use App\Http\Controllers\UsersController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'v1'], function () {
    Route::get('/checkIfLogin', [UsersController::class, 'checkIfLogin'])->middleware('auth:api');
    Route::post('/login', [UsersController::class, 'login']);
    Route::post('/register', [UsersController::class, 'register']);
    Route::get('/logout', [UsersController::class, 'logout'])->middleware('auth:api');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'api'])->middleware('guest');
    Route::get('/mongoTest', [QaController::class, 'mongoTest']);
    Route::get('/getallcompanies', [CompanyController::class, 'getAll'])->middleware('auth:api');
    Route::post('/savecompany', [CompanyController::class, 'save'])->middleware('auth:api');
    Route::post('/project/save', [ProjectController::class, 'save'])->middleware('auth:api');
    Route::get('/project/getall', [ProjectController::class, 'getAll'])->middleware('auth:api');
    Route::get('/qa/{code}', [QaController::class, 'getQa']);
    Route::post('/answer/save', [AnswerController::class, 'save']);
    Route::get('/qsample/getall', [QsampleController::class, 'getAll'])->middleware('auth:api');

});
