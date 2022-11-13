<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\listaccountController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\editaccountController;
use App\Http\Controllers\editinfoController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\EnsureTokenIsValid;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/login')->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/', [LoginController::class, 'checkLogin'])->name('checklogin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});




//Route::prefix('/admin')->group(function () {
Route::get('/show-dashboard', [dashboardController::class, 'showdashboard'])->name('dashboard');
Route::post('/post-dashboard', [dashboardController::class, 'dashboard'])->name('post.dashboard');
// Route::put('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::get('/account', [accountController::class, 'index'])->name('show.account');
Route::get('/listaccount', [listaccountController::class, 'index'])->name('show.listaccount');
Route::get('/question', [questionController::class, 'index'])->name('show.question');
Route::get('/news', [newsController::class, 'index'])->name('show.news');
Route::get('/editaccount', [editaccountController::class, 'index'])->name('show.editaccount');
Route::get('/editinfo', [editinfoController::class, 'index'])->name('show.editinfo');
//});