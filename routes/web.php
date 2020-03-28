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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-new-page', 'addNewPageController@addNewModule');

//upload file
Route::post('/upload', 'addNewPageController@upload')->name('upload');
//submit media form
Route::post('/submit-media-form', 'addNewPageController@submitMediaForm');
//media module
Route::get('/media-module', 'mediaModuleController@viewMediaModule');
//delete media
Route::get('/delete-media-module/{id}', 'mediaModuleController@deleteMediaModule');
//categories module
Route::get('/categories-module', 'categoriesController@viewCategoriesModule');
//create categories
Route::post('/create-categories', 'categoriesController@submitCategories');
//get category
Route::get('/view-category/{id}', 'categoriesController@viewCategories');
//update categories
Route::post('/update-categories', 'categoriesController@updatecategories');
//delete category
Route::get('/delete-categories/{id}', 'categoriesController@deleteCategoryModule');
//view all module
Route::get('/view-all-content', 'viewAllController@viewAllModule');
Route::get('/view-all-content/{id}', 'viewAllController@viewAllcontent');