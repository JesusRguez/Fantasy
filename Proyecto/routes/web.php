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

Route::get('/', 'FantasyController@index')->name('index');
Route::get('/search', 'FantasyController@search');

//Route::resource('','GeneralController');
//Route::get('/display', 'GameController@display')->name('display');

Route::resource('fantasy', 'FantasyController')->except([
    'index'
]);
Route::resource('display', 'GameController');

Route::resource('mock', 'QuizController');

Route::resource('login', 'LoginController');

Route::post('fantasy/create', 'FantasyController@storeAjax');

Route::post('fantasy/modalFields', 'FantasyController@modalAjax');


Route::post('activepoint/create', 'ActivePointController@storeAjax');

Route::post('activepoint/modalFields','ActivePointController@modalAjax');

Route::post('activepoint/delete/', 'ActivePointController@deleteAjax');



Route::post('quiz/fantasy','QuizController@storeAjaxFantasy');

Route::post('quiz/activePoint','QuizController@storeAjaxAP');

Route::post('quiz/APModalFields','QuizController@modalAPAjax');

Route::post('quiz/FantasyModalFields', 'QuizController@modalFantasyAjax');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
