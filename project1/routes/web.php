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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::middleware(['auth'])->group(function() {
    Route::get('chooseimage', function() {
        return view('chooseimage');
    });
    Route::resource('images', 'ImageController');
    Route::post('moveimage', 'ImageController@moveImage');
    Route::get('storeimage', 'ImageController@storeImage');
    Route::get('deleteimage/{id}', 'ImageController@validateDeleteImage');
    Route::post('addcomment', 'CommentController@create');
    Route::post('addlike', 'LikeController@create');
    Route::post('removelike', 'LikeController@destroy');
    Route::resource('comments', 'CommentController');
});
Route::get('/error',function() {
   return view('error/404');
});

