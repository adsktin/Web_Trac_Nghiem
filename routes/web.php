<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\NewsController;

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

// Route::prefix('login')->group(function () {

// });
Route::get('login', [LoginController::class, 'formlogin'])->name('formlogin');
Route::post('login', [LoginController::class, 'Login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('checkadmin')->group(function () {
    Route::get('profile', [AccountController::class, 'showprofile'])->name('show-profile');
    Route::get('dashboard', [DashboardController::class, 'showdashboard'])->name('show-dashboard');
    Route::post('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //account
    Route::middleware('createaccount')->group(function () {
        Route::get('account', [AccountController::class, 'showaccount'])->name('show-account');
        Route::get('account/showcreate', [AccountController::class, 'showcreate'])->name('showcreate-account');
        Route::post('account/create', [AccountController::class, 'create'])->name('create-account');
        Route::get('account/edit/{id}', [AccountController::class, 'edit'])->name('edit-account');
        Route::post('account/update', [AccountController::class, 'update'])->name('update-account');
        Route::post('account/changestatus', [AccountController::class, 'changestatus'])->name('changestatus-account');
        Route::delete('account/delete', [AccountController::class, 'delete'])->name('delete-account');
    });

    //question
    Route::get('question', [QuestionController::class, 'showquestion'])->name('show-question');
    Route::get('question/showcreate', [QuestionController::class, 'showcreate'])->name('showcreate-question');
    Route::post('question/create', [QuestionController::class, 'create'])->name('create-question');
    Route::get('question/showedit/{id}', [QuestionController::class, 'edit'])->name('showedit-question');
    Route::post('question/edit', [QuestionController::class, 'update'])->name('edit-question');
    Route::delete('question/delete', [QuestionController::class, 'delete'])->name('delete-question');

    //type quest
    Route::get('question/type', [QuestionController::class, 'showtype'])->name('showtype-question');
    Route::post('question/type', [QuestionController::class, 'createtype'])->name('createtype-question');
    Route::delete('question/type-delete', [QuestionController::class, 'deletetypes'])->name('delete-types');

    // news
    Route::get('news', [NewsController::class, 'shownews'])->name('show-news');
    Route::get('news/showcreate', [NewsController::class, 'showcreate'])->name('showcreate-news');
    Route::post('news/create', [NewsController::class, 'create'])->name('create-news');
    Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('edit-news');
    Route::post('news/update', [NewsController::class, 'update'])->name('update-news');
    Route::delete('news/delete', [NewsController::class, 'delete'])->name('delete-news');
});