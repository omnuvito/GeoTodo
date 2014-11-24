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

Route::get('/', function()
{
	return View::make('index');
});
Route::get('prueba', function(){
	return View::make('prueba');
});
Route::group(array('prefix'=>'api'), function(){
	Route::resource('tasks', 'TasksController', array('only'=>array('index','store','destroy','show')));
	Route::resource('categories', 'CategoriesController', array('only'=>array('index','store','destroy')));
	Route::resource('users', 'UsersController', array('only'=>array('index','store','destroy')));
});
App::missing(function($exception){
	return View::make('index');
});