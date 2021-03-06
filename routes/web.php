<?php

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
  return view('welcome');
});

Auth::routes();

Route::get('/questions', 'QuestionsController@index');
Route::get('/questions/{question}', 'QuestionsController@show');
Route::post('/questions/{question}/answer', 'QuestionsController@store');
Route::delete('questions/answers/{answer}', 'QuestionsController@destroy')->name('answers.destroy');
Route::get('/questions/answers', 'QuestionsController@answerList');
Route::post('/answer/{answer}/vote/up', 'AnswerController@voteUp');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
