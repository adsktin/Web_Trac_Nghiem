<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\APIs\NewsController;

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
Route::POST('/login', [AuthController::class, 'login']);
Route::POST('/register', [AuthController::class, 'register']);
// Route::get('account/edit/{id}', [AccountController::class, 'edit']);
Route::get('/news',  [NewsController::class, 'shownews']);