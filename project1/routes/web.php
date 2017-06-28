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

Route::get('/', 'Sites\HomeController@index');

Auth::routes();

Route::get('/home', 'Sites\HomeController@index');
Route::get('/error',function() {
   return view('error/404');
});

Route::group(['namespace' => 'Sites', 'middleware' => 'auth'], function() {
    Route::get('chooseimage', function() {
        return view('sites.image.choose');
    })->name('image.choose');
    Route::post('showimage', 'ImageController@showImage')->name('image.post');
    Route::get('storeimage', 'ImageController@storeImage')->name('image.store');
    Route::get('delete/{id}', 'ImageController@validateDeleteImage')->name('image.delete');
    Route::post('addcomment', 'CommentController@create');
    Route::post('likes/create', 'LikeController@create');
    Route::post('likes/delete', 'LikeController@destroy');
    Route::resource('comments', 'CommentController');
    Route::resource('images', 'ImageController');
});
Route::get('admin', function() {
        return view('admin.login');
    })->name('admin');
Route::post('admin', 'Admin\AdminController@login')->name('admin.login');
Route::group(['namespace' => 'Admin'], function() {
    Route::get('admin', function() {
        return view('admin.login');
    })->name('admin');
    Route::post('admin', 'AdminController@login')->name('admin.login');

    Route::group(['middleware' => 'checkrole'], function() {
        Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
        Route::get('admin/images/{image}', 'ImageController@show');
        Route::post('admin/images/{image}/destroy', 'ImageController@destroy');
        Route::get('admin/users/{user}', 'UsersController@show');
        Route::post('admin/users/{user}/edit', 'UsersController@edit');
        Route::post('admin/users/{user}/delete', 'UsersController@destroy');
        Route::get('admin/users/validatedelete/{user}', 'UsersController@validateDelete');
        Route::get('admin/images', 'ImageController@index')->name('admin.image.index');

        Route::get('admin/users', 'UsersController@index')->name('admin.user.index');

        Route::get('admin/create', function() {
            return view('admin.user.create');
        })->name('admin.user.create');
        Route::post('admin/create', 'UsersController@create');
    });
});
Route::get('test', 'Sites\ImageController@test');

