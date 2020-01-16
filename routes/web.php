<?php
//page route start
Route::get('/','genarelController@homePage');
Route::get('about','genarelController@aboutPage')->name('about');
Route::get('contact/us','genarelController@contactPage')->name('contact');
//page route end

//category goes here
Route::get('create/category','postsController@add_category')->name('add_category');
Route::get('view/category','postsController@view_category')->name('view.category');
Route::post('store/category','postsController@store_category')->name('store.category');
Route::get('view/single_category/{id}','postsController@view_single_category');
Route::get('Delete/single_category/{id}','postsController@delete_category');
Route::get('edit/category/{id}','postsController@edit_category');
Route::post('update/category/{id}','postsController@update_category');
//End category section

//posts here
Route::get('create/post','postsController@write_post')->name('write_post');
Route::post('store/post','postsController@create_post')->name('store.post');
Route::get('all/post','postsController@view_all_post')->name('all.post');
Route::get('view/single_post/{id}','postsController@view_single_post');
Route::get('edit/post/{id}','postsController@edit_single_post');
Route::post('update/post/{id}','postsController@update_post');
Route::get('delete/post/{id}','postsController@delete_post');
//end post here
