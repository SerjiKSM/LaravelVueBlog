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

Route::get('/{anypath}','HomeController@index')->where('path','.*');

Route::group(['middleware' => ['auth']], function () {
    //Category
//    Route::post('/add-category','CategoryController@addCategory');
//    Route::get('category','CategoryController@allCategory');
//    Route::get('category/{id}','CategoryController@deleteCategory');
//    Route::get('editcategory/{id}','CategoryController@editCategory');
//    Route::post('update-category/{id}','CategoryController@updateCategory');
//    Route::get('/deletecategory/{id}','CategoryController@selectedCategory');

    //Post
//    Route::get('/post','PostController@allPost');
//    Route::post('/savepost','PostController@savePost');
//    Route::get('/delete/{id}','PostController@deletePost');
//    Route::get('/post/{id}','PostController@editPost');
//    Route::post('/update/{id}','PostController@updatePost');
});



//Route::get('/blogpost','BlogController@getAllBlogPost');
//Route::get('/singlepost/{id}','BlogController@getpostById');
//Route::get('/categories','BlogController@getAllCategory');
//Route::get('/categorypost/{id}','BlogController@getAllPostByCatId');
//Route::get('/search','BlogController@searchPost');
//Route::get('/latestpost','BlogController@latestPost');
