<?php

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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/events', 'EventsController');
    Route::resource('/questions', 'QuestionsController');
    Route::resource('/answers', 'AnswersController');
    Route::patch('/answers/{event_id}/sort', 'AnswersController@sort');
    Route::delete('/answers/{answer_id}/media', 'AnswersController@deleteAnswerMedia');
    
    // Tsst Web routes
    // Route::resource('/tests', 'TestsController');
    Route::post('/tests/save_guest', 'TestsController@save_guest')->name('tests.save_guest');
    Route::post('/tests/save_answers/{id}', 'TestsController@save_answers')->name('tests.save_answers');
    Route::get('/tests/create/{id}', 'TestsController@create')->name('tests.create');
    Route::get('/tests/questions/{id}', 'TestsController@show')->name('tests.show');
});



