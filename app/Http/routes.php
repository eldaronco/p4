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

Route::get('/', 'WelcomeController@getIndex');

Route::get('/activities/create', 'ActivityController@getCreate');
Route::post('/activities/create', 'ActivityController@postCreate');

Route::get('/activities/edit/{id?}', 'ActivityController@getEdit');
Route::post('/activities/edit', 'ActivityController@postEdit');

Route::get('/activities', 'ActivityController@getIndex');
Route::get('/activities/show/{id?}', 'ActivityController@getShow');

Route::get('/schedules/create', 'ScheduleController@getCreate');
Route::post('/schedules/create', 'ScheduleController@postCreate');

Route::get('/schedules/edit/{id?}', 'ScheduleController@getEdit');
Route::post('/schedules/edit', 'ScheduleController@postEdit');

Route::get('/schedules', 'ScheduleController@getIndex');
Route::get('/schedules/show/{title?}', 'ScheduleController@getShow');

Route::get('/practice', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Practice';

});
