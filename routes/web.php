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
// Front Start
Route::get('/','FrontIndexController@homeIndex');
Route::get('/product-category','FrontIndexController@productCategory');
Route::get('/product-details','FrontIndexController@productDetails');
// Front End
// Admin Start
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// For Category
Route::get('/category/add-category', 'CategoryController@addCategoryInfo');
Route::post('/category/new-category', 'CategoryController@saveCategoryInfo');
Route::get('/category/manage-category', 'CategoryController@manageCategoryInfo');
Route::get('/category/unpublished-category/{id}', 'CategoryController@unpublishedCategoryInfo');
Route::get('/category/published-category/{id}', 'CategoryController@publishedCategoryInfo');
Route::get('/category/edit-category/{id}', 'CategoryController@editCategoryInfo');
Route::post('/category/update-category/{id}', 'CategoryController@updateCategoryInfo');
Route::get('/category/delete-category/{id}', 'CategoryController@deleteCategoryInfo');

//For Brand
Route::get('/brand/add-brand', 'BrandController@showBrandForm');
Route::post('/brand/new-brand', 'BrandController@saveBrandInfo');
Route::get('/brand/manage-brand', 'BrandController@manageBrandInfo');
Route::get('/brand/unpublished-brand/{id}', 'BrandController@unpublishedBrandInfo');
Route::get('/brand/published-brand/{id}', 'BrandController@publishedBrandInfo');
Route::get('/brand/edit-brand/{id}', 'BrandController@editBrandInfo');
Route::post('/brand/update-brand', 'BrandController@updateBrandInfo');
Route::get('/brand/delete-brand/{id}', 'BrandController@deleteBrandInfo');

// For Product
Route::get('/product/add-product', 'ProductController@showProductForm');
Route::post('/product/new-product', 'ProductController@saveProductInfo');
//Route::get('/product/manage-product', 'ProductController@showProductForm');
//Route::get('/product/add-product', 'ProductController@showProductForm');
//Route::get('/product/add-product', 'ProductController@showProductForm');
//Route::get('/product/add-product', 'ProductController@showProductForm');
//



// Admin End
