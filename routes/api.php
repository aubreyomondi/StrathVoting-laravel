<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('articles', 'ArticleController@index');
    Route::get('articlesTitle', 'ArticleController@indexTitle');
    Route::get('articles/{article}', 'ArticleController@show');
    Route::post('articles', 'ArticleController@store');
    Route::post('articles/{article}', 'ArticleController@update');
    Route::delete('articles/{article}', 'ArticleController@delete');
});

    Route::get('candidates', 'CandidateController@index');
    Route::get('candidatesName', 'CandidateController@candidatesName');
    Route::get('candidates/{article}', 'CandidateController@show');
    Route::post('candidates', 'CandidateController@store');
    Route::post('candidates/{article}', 'CandidateController@update');
    Route::delete('candidates/{article}', 'CandidateController@delete');
