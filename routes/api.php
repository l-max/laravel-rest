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
Route::post('/login','PassportController@login');
Route::post('/register','PassportController@register');

Route::middleware('auth:api')->group(function()
{
    Route::get('user', 'PassportController@details');
    Route::resource('todo', 'TodoController');

//    Route::post('/todo/','TodoController@store');
//    Route::get('/todo/','ApiController@index');
//    Route::get('/todo/{todo}','ApiController@show');
//    Route::put('/todo/{todo}','ApiController@update');
//    Route::delete('/todo/{todo}','ApiController@destroy');
});