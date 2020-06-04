<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ProductsController@getLatestProduct');

Route::get('/contactus', function () {
    return view('contactus');
});
Route::get('/aboutus',function (){
    return view('aboutus');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/admindahsboard','AdminController@getAllData');

Route::get('/addProduct','ProductsController@getProductCategory');
Route::get('/updateproduct/{id}','ProductsController@getDataEdit');
Route::get('/deletproduct/{id}','ProductsController@deleteProduct');
Route::post('addNew','ProductsController@addNewProduct');
Route::post('updateProduct','ProductsController@updateProduct');


Route::get('/cart','ProductsController@showcart');
Route::get('/addtoCart/{id}','ProductsController@addTocart');
Route::get('/removeFromCart/{id}','ProductsController@removeFromcart');



Route::get('/showProduct/{id}','ProductsController@showOneProduct');
Route::post('/actionProduct/{id}','ProductsController@actionProduct');

Route::get('/shop','ProductsController@showAllProduct');


Route::get('/profile/{id}','UserController@getprofile');
Route::post('/updatepicture','UserController@updatePicture');
Route::post('/updateprofile','UserController@updateProfile');
Route::post('/updatepassword','UserController@updatePassword');








Auth::routes();

Route::get('/home', 'ProductsController@getLatestProduct');
