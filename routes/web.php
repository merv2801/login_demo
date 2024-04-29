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
// Route::get('/logout', function () {
//     return view('users.login');
// })->middleware('throttle:LimitByFive');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [ApiController::class, 'register'])->name('register')->middleware('throttle:LimitByFive');
    Route::post('/register', [UserController::class, 'registerpost'])->name('registerpost')->middleware('throttle:LimitByFive');
    Route::get('/login', [ApiController::class, 'login'])->name('login')->middleware('throttle:LimitByFive');
    Route::post('/loginpost', [UserController::class, 'loginpost'])->name('loginpost')->middleware('throttle:LimitByFive');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [ApiController::class, 'dashboardget'])->middleware('throttle:LimitByFive');
    Route::get('/logout', [ApiController::class, 'logout'])->name('logout')->middleware('throttle:LimitByFive');
});
