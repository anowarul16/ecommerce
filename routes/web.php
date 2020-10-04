<?php

Auth::routes();

Route::get('/', 'Web\WebController@index');

Route::get('/home', 'HomeController@index')->name('home');

/***      category controller....................... */

Route::get('category-list', 'Admin\Category\CategoryController@index');
Route::get('category-create', 'Admin\Category\CategoryController@create');
Route::post('submit-category-form', 'Admin\Category\CategoryController@store');
Route::get('edit-category-{id}', 'Admin\Category\CategoryController@edit');
Route::post('submit-category-edit-form', 'Admin\Category\CategoryController@update');
Route::get('delete-category-{id}', 'Admin\Category\CategoryController@destroy');


/***  ..........Subcategory controller............. */

Route::get('subcategory-list', 'Admin\subcategory\SubcategoryController@index');
Route::get('subcategory-create', 'Admin\subcategory\SubcategoryController@create');
Route::post('submit-subcategory-form', 'Admin\subcategory\SubcategoryController@store');
Route::get('edit-subcategory-{id}', 'Admin\subcategory\SubcategoryController@edit');
Route::post('submit-subcategory-edit-form', 'Admin\subcategory\SubcategoryController@update');
route::get('delete-subcategory-{id}', 'Admin\subcategory\SubcategoryController@destroy');


/***.......................Brand......................... */

Route::get('brand-list', 'Admin\Brand\BrandController@index');
Route::get('brand-create', 'Admin\Brand\BrandController@create');
Route::post('submit-brand-form', 'Admin\Brand\BrandController@store');
Route::get('edit-brand-{id}', 'Admin\Brand\BrandController@edit');
Route::post('submit-brand-edit-form', 'Admin\Brand\BrandController@update');
Route::get('delete-brand-{id}', 'Admin\Brand\BrandController@destroy');

/***....................Supplier................ */
Route::get('supplier-list', 'Admin\Supplier\SupplierController@index');
Route::get('supplier-create', 'Admin\Supplier\SupplierController@create');
Route::post('submit-supplier-form', 'Admin\Supplier\SupplierController@store');
Route::get('edit-supplier-{id}', 'Admin\Supplier\SupplierController@edit');
Route::post('submit-supplier-edit-form', 'Admin\Supplier\SupplierController@update');
Route::get('delete-supplier-{id}', 'Admin\Supplier\SupplierController@destroy');

/*********.............Product................. */
Route::get('product-list', 'Admin\Product\ProductController@index');
Route::get('product-create', 'Admin\Product\ProductController@create');
Route::post('submit-product-form', 'Admin\Product\ProductController@store');
Route::get('edit-product-{id}', 'Admin\Product\ProductController@edit');
Route::post('submit-product-edit-form', 'Admin\Product\ProductController@update');
Route::get('delete-product-{id}', 'Admin\Product\ProductController@destroy');

/***** ......................Setting............*/
Route::get('logo-setting', 'Admin\Setting\SettingController@logo');
Route::post('submit-logo-setting','Admin\Setting\SettingController@store');





























