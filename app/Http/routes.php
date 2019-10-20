<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', function () {
    return redirect('/home');
});
 
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);


Route::group(['middleware' => 'auth'], function () {
    // hack to avoid flash messages being cached by browser.
    // without using ajax, the flash message will display when user presses back button
    // TODO: find a more elegant solution
    Route::get('/flash', function() {
        echo json_encode(['message' => session()->pull('flash_message'), 'message_level' => session()->pull('flash_message_level')]);
    });

    Route::patch('users/{user}/setadmin', 'UserController@setAdminStatus');
    Route::any('users/{user_id}/upload', 'UserController@upload');
    
    Route::resource('users', 'UserController', [
        'parameters' => 'singular',
        'except' => ['edit']
    ]);
    
    Route::resource('teams', 'TeamController', [
        'parameters' => 'singular',
        'except' => ['edit']
    ]);
    
    Route::any('teams/{team_id}/player', 'PlayersController@player');
    
    Route::resource('players', 'PlayersController', [
        'parameters' => 'singular',
        'except' => ['edit']
    ]);
    Route::any('players/update/{id}', 'PlayersController@update');
    
    Route::resource('match', 'MatchesController', [
        'parameters' => 'singular',
        'except' => ['edit']
    ]);

    Route::resource('points', 'PointsController', [
        'parameters' => 'singular',
        'except' => ['edit']
    ]);
});