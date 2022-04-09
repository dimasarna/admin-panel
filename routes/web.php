<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\GroupQuizController;

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'can:Admin'], function() {
    Route::resource('users', UserController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('quizzes', QuizController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('histories', HistoryController::class);
    Route::resource('group_user', GroupUserController::class);
    Route::resource('group_quiz', GroupQuizController::class);
    Route::resource('quiz_question', QuizQuestionController::class);
});
