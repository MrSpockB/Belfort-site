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
    return view('pages.home');
});
Route::get('/adminpanel', 'AdminController@index');
Route::get('/adminpanel/bikes', 'AdminController@bikes');
Route::get('/adminpanel/pages', 'AdminController@pages');
Route::post('/adminpanel/bikeFile', ['as'=> 'admin.upload','uses' => 'AdminConstoller@uploadFile']);
Route::get('/{slug}', array('as'=>"page.show", "uses" => 'PageController@show'));




