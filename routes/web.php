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

Route::get('/','QuestionController@index')->name('questions');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/questions','QuestionController')->except(['store','show']);
Route::post('/question', 'QuestionController@store');


Route::resource('questions.answers','AnswerController')->except(['index','create','show']);

//Route::post('/questions/{question}/answers', 'AnswerController@store')->name('answers.store');
Route::get('/questions/{slug}', 'QuestionController@show')->name('questions.show');

Route::post('/answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');
Route::post('/questions/{question}/favorites', 'FavoritesController@store')->name('questions.favorite');
Route::delete('/questions/{question}/favorites', 'FavoritesController@destroy')->name('questions.unfavorite');
Route::post('/questions/{question}/vote', 'VoteQuestionController');
Route::post('/answers/{answer}/vote', 'VoteAnswerController');
Route::resource('/users', 'UsersController',['as'=>'backend']);
Route::resource('/account', 'AccountController',['as'=>'backend']);
Route::put('/profile/{user}', 'ProfileController@update')->name('profile.update');
Route::get('/profile/{user}/edit', [
    'uses' => 'ProfileController@edit',
    'as'   => 'profile-edit'
]);

Route::get('/category/{category}', [
    'uses' => 'QuestionController@category',
    'as'   => 'category'
]);

Route::get('/cat/{id}', [
    'uses' => 'HomeController@cat',
    'as'   => 'category.home'
]);


Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');
Route::get('login/twitter/callback', 'SocialController@TwitterCallback');