<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\QaController;
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
    Route::post('/login', [UsersController::class, 'login']);
    Route::post('/register', [UsersController::class, 'register']);
    Route::get('/logout', [UsersController::class, 'logout'])->middleware('auth:api');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'api'])->middleware('guest');
    Route::get('/mongoTest', [QaController::class, 'mongoTest']);
});
