<?php

use App\Article;
use App\Http\Controllers\Auth\RegisterController;
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


//retrieve a list of data
Route::get('articles', 'ArticleController@index');

//retrieve a single data
Route::get('articles/{id}','ArticleController@show');

//store data in db
Route::post('articles','ArticleController@store');

//update data
Route::put('articles/{id}','ArticleController@update');

//delete data
Route::delete('articles/{id}','ArticleController@delete');

//register user and issue an api
Route::post('register','Auth\RegisterController@register');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
