<?php

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
Auth::routes(['register'=>false,'reset'=>false,'verify'=>false]);

Route::get('/', function(){
    if(Auth::check()){
        return redirect()->route('admin.home');
    }else{
        return view('auth.login');
    }
    
})->middleware('auth');

Route::prefix('/dashboard')->name('admin.')->namespace('Dashboard')->group(function () {
    Route::get('/','IndexController@index')->name('home');
    Route::get('/profile','IndexController@profile')->name('profile');
    Route::patch('/profile/update','IndexController@updateProfile')->name('updateProfile');
    Route::resource('/products','ProductController');
    Route::post('/products/search','ProductController@search')->name('products.search');

    Route::resource('clients', 'ClientController');
    Route::post('/clients/search','ClientController@search')->name('clients.search');
    
    Route::resource('{id}/orders', 'OrderController')->except('show','edit','update');

    Route::resource('users', 'UserController');
    Route::post('/users/search','UserController@search')->name('users.search');
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');