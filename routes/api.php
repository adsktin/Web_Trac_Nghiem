<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\APIs\NewsController;
use App\Http\Controllers\APIs\RankController;
use App\Http\Controllers\APIs\QuestionController;


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
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/news',  [NewsController::class, 'shownews']);
Route::get('/news-detail/{id}',  [NewsController::class, 'getDetailNews']);
Route::get('/ranks',  [RankController::class, 'showranks']);
Route::get('/types',  [QuestionController::class, 'getTypeQuestion']);
Route::post('/questions',  [QuestionController::class, 'randQuestion']);