<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\listaccountController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('admin.pages.dashboard');
});
Route::get('/admin/dashboard',[dashboardController::class,'index'])->name('dashboard');
Route::get('/admin/account',[accountController::class,'index'])->name('account');
Route::get('/admin/listaccount',[listaccountController::class,'index'])->name('listaccount');
