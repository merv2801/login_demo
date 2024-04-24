<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Http\FormRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('users.login');
})->middleware('throttle:LimitByFive');

Route::get('/login', function () {
    return view('users.login');
})->middleware('throttle:LimitByFive');

Route::get('/dashboard', function () {
    return view('users.dashboard');
})->middleware('throttle:LimitByFive');

Route::get('/logout', function () {
    return view('users.login');
})->middleware('throttle:LimitByFive');

Route::post("logindetails", [ApiController::class, "index"]);

// Route::get('dashboard',[Controller::class, 'dashboard'])
// 
// ->name('dashboard');