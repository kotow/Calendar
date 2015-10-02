<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::resource('project', 'ProjectController');
Route::resource('task', 'TaskController');
Route::get('task/create/{project}', 'TaskController@create');

Route::get('api/dropdown', function(){
    $input = Input::get('option');
    return Response::json(DB::table('tasks')->where('project_id', $input)->get(array('id','name')));
});

Route::get('/', 'CalendarController@index');


Route::get('calendar/next', 'CalendarController@nextMonth');

Route::resource('calendar', 'CalendarController');
App::missing(function($exception)
{
    return Redirect::to('/project');
});