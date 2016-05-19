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
Route::get('/', function (){ return view('pages.home'); });

/* Rutas del admin */
Route::get('/adminpanel', 'AdminController@index');
Route::get('/adminpanel/bikes', 'AdminController@bikes');
Route::get('/adminpanel/pages', 'AdminController@pages');
Route::post('/adminpanel/bikeFile', ['as'=> 'admin.upload','uses' => 'AdminController@uploadFile']);

/* Rutas del CRUD de las bicis */
Route::get('/adminpanel/bikes/add', 'AdminController@createBike');
Route::post('/adminpanel/bikes/add', ['as'=> 'bikes.store','uses' => 'AdminController@storeBike']);
Route::get('/adminpanel/bikes/{id}/edit', 'AdminController@editBike');
Route::put('/adminpanel/bikes/{id}', ['as'=> 'bikes.update','uses' => 'AdminController@updateBike']);
Route::delete('/adminpanel/bikes/{id}', 'AdminController@updateBike');

// Rutas del CRUD de las imagenes

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/adminpanel/images', 'ImageController');
});
// Rutas del carrito del e-commerce
Route::get('/carro', 'CartController@viewCart');
Route::post('/carro', 'CartController@addToCart');
Route::get('/deletecarro', 'CartController@deleteCart');

/* Rutas del sitio general */
Route::get('/bikes', 'BikesController@showAll');
Route::get('/bikes/{slug}', 'BikesController@showBike');
Route::get('/{slug}', array('as'=>"page.show", "uses" => 'PageController@show'));




