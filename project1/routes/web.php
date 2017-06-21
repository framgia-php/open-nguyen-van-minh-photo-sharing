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

Route::get('/', 'ImageController@getImage');

Auth::routes();

Route::get('home', 'ImageController@getImage');
Route::get('chooseimage', [
    'middleware' => 'guest',
    'uses' => function() {
        return view('chooseimage');
}]);
Route::post('moveimage', [
    'middleware' => 'guest',
    'uses' => 'ImageController@moveImage',
]);
Route::post('postimage', [
    'middleware' => 'guest',
    'uses' => 'ImageController@postImage',
]);
Route::get('storeimage', [
    'middleware' => 'guest',
    'uses' => 'ImageController@storeImage',
]);
Route::get('editimage/{id}', [
    'middleware' => 'guest',
    'uses' => 'ImageController@showImage',
]);
Route::post('updateimage', [
    'middleware' => 'guest',
    'uses' => 'ImageController@updateImage',
]);
Route::get('/error',function() {
   return view('error/404');
});
Route::get('deleteimage/{id}', [
    'middleware' => 'guest',
    'uses' => 'ImageController@isDeleteImage',
]);
Route::post('deleteimage', [
    'middleware' => 'guest',
    'uses' => 'ImageController@deleteImage',
]);
