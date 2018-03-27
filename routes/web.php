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
    Route::get('/events/config/{id}', 'EventsController@config')->name('event.config');
    Route::get('/events/theme/{id}/view', 'EventsController@theme')->name('event.theme');
    Route::get('/events/dashboard/{id}', 'EventsController@dashboard')->name('events.dashboard');
    Route::patch('/events/config/sortPhotos', 'EventsController@sortPhotos')->name('event.configPhotos');
    Route::patch('/events/config/sortQuestions', 'EventsController@sortQuestions')->name('event.configQuestions');
    
    Route::resource('/questions', 'QuestionsController');
    Route::resource('/answers', 'AnswersController');
    Route::patch('/answers/{event_id}/sort', 'AnswersController@sort');
    Route::delete('/answers/{answer_id}/media', 'AnswersController@deleteAnswerMedia');
    
    Route::get('/event/{event_id}/posts/', 'PostsController@index')->name('posts.index');
    Route::post('/event/{event_id}/posts/', 'PostsController@store')->name('posts.store');
    Route::get('/event/{event_id}/posts/create', 'PostsController@create')->name('posts.create');
    Route::get('/event/{event_id}/posts/{id}/edit', 'PostsController@edit')->name('posts.edit');
    Route::put('/event/{event_id}/posts/{id}', 'PostsController@update')->name('posts.update');
    Route::delete('/event/{event_id}/posts/{id}', 'PostsController@destroy')->name('posts.destroy');

    Route::get('/event/{event_id}/adresses/', 'AdressesController@index')->name('adresses.index');
    Route::post('/event/{event_id}/adresses/', 'AdressesController@store')->name('adresses.store');
    Route::get('/event/{event_id}/adresses/create', 'AdressesController@create')->name('adresses.create');
    Route::get('/event/{event_id}/adresses/{id}/edit', 'AdressesController@edit')->name('adresses.edit');
    Route::put('/event/{event_id}/adresses/{id}', 'AdressesController@update')->name('adresses.update');
    Route::delete('/event/{event_id}/adresses/{id}', 'AdressesController@destroy')->name('adresses.destroy');
    // Tsst Web routes
    // Route::resource('/tests', 'TestsController');
    
});
Route::post('/tests/save_guest', 'TestsController@save_guest')->name('tests.save_guest');
Route::post('/tests/save_answers/{id}', 'TestsController@save_answers')->name('tests.save_answers');
Route::get('/tests/create/{id}', 'TestsController@create')->name('tests.create');
Route::get('/tests/questions/{id}', 'TestsController@show')->name('tests.show');
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

