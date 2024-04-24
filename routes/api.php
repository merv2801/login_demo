<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use Illuminate\Foundation\Http\FormRequest;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Unprotected Routes
Route::post("register", [UserController::class, "register"])->middleware('throttle:LimitByFive');
Route::post("login", [UserController::class, "login"])->middleware('throttle:LimitByFive');

//Protected Routes
Route::group([
    "middleware" =>['auth:api']
], function(){
    Route::get("dashboard", [UserController::class, "dashboard"])->middleware('throttle:LimitByFive');
    Route::get("logout", [UserController::class, "logout"])->middleware('throttle:LimitByFive');
});