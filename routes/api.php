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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Content-Type, Authorizations');

Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@show');
Route::put('users/{user}', 'UserController@update');
Route::post('users', 'UserController@store');
Route::delete('users/{user}', 'UserController@destroy');

Route::get('puzzles', 'PuzzleController@index');
Route::get('puzzles/{puzzle}', 'PuzzleController@show');
Route::put('puzzles/{puzzle}', 'PuzzleController@update');
Route::post('puzzles', 'PuzzleController@store');
Route::delete('puzzles/{puzzle}', 'PuzzleController@destroy');
