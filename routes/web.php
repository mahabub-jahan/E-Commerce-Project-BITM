<?php


// Front Start
Route::get('/','FrontIndexController@homeIndex');
Route::get('/product-category/{id}','FrontIndexController@productCategory');
Route::get('/product-details/{id}','FrontIndexController@productDetails');
// Front End

//Cart Start
Route::post('/add-to-cart','CartController@addToCart');
Route::get('/show-cart','CartController@showCart');
Route::post('/update-cart-product','CartController@updateCart');
Route::get('/delete-cart-product/{id}','CartController@deleteCart');
// Cart End

// User Sign In, Login
Route::get('/checkout','CheckoutController@index');
Route::post('/new-customer','CheckoutController@saveCustomerInfo');
Route::get('/shipping-info', 'CheckoutController@showShippingInfo');
Route::get('/customer-logout', 'CheckoutController@customerLogout');
Route::post('/customer-login', 'CheckoutController@customerLoginCheck');
Route::post('/new-shipping', 'CheckoutController@saveShippingInfo');
Route::get('/payment-info', 'CheckoutController@showPaymentForm');

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
Route::get('/brand/manage-brand', 'BrandController@manageBrandInfo')->middleware('AuthenticateMiddleware');
Route::get('/brand/unpublished-brand/{id}', 'BrandController@unpublishedBrandInfo');
Route::get('/brand/published-brand/{id}', 'BrandController@publishedBrandInfo');
Route::get('/brand/edit-brand/{id}', 'BrandController@editBrandInfo');
Route::post('/brand/update-brand', 'BrandController@updateBrandInfo');
Route::get('/brand/delete-brand/{id}', 'BrandController@deleteBrandInfo');

// For Product
Route::get('/product/add-product', 'ProductController@showProductForm');
Route::post('/product/new-product', 'ProductController@saveProductInfo');
Route::get('/product/manage-product', 'ProductController@manageProductInfo');
//Route::get('/product/add-product', 'ProductController@showProductForm');
//Route::get('/product/add-product', 'ProductController@showProductForm');
//Route::get('/product/add-product', 'ProductController@showProductForm');
//



// Admin End
