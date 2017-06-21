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
    'middleware' => 'checklogin',
    'uses' => function() {
        return view('chooseimage');
}]);
Route::post('moveimage', [
    'middleware' => 'checklogin',
    'uses' => 'ImageController@moveImage',
]);
Route::post('postimage', [
    'middleware' => 'checklogin',
    'uses' => 'ImageController@postImage',
]);
Route::get('storeimage', [
    'middleware' => 'checklogin',
    'uses' => 'ImageController@storeImage',
]);
Route::get('editimage/{id}', [
    'middleware' => 'checklogin',
    'uses' => 'ImageController@showImage',
]);
Route::post('updateimage', [
    'middleware' => 'checklogin',
    'uses' => 'ImageController@updateImage',
]);
Route::get('/error',function() {
   return view('error/404');
});
Route::get('deleteimage/{id}', 'ImageController@isDeleteImage');
Route::post('deleteimage', 'ImageController@deleteImage');
