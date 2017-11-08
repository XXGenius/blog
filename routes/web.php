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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('article', 'ArticleController');
Route::get('subscription/update{id}', 'SubscriptionController@update')->name('subscription.update');
Route::get('subscription/destroy{id}', 'SubscriptionController@destroy')->name('subscription.destroy');
Route::get('subscription/', 'SubscriptionController@index')->name('subscription.index');
Route::group(['middleware' => 'web'], function () {
    Route::post('article/store', 'ArticleController@store');
    Route::get('article/detroy', 'ArticleController@destroy');

});