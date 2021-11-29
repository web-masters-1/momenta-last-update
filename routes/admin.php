<?php

Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@getIndex']);
Route::resource('article', 'ArticleController');
Route::resource('category', 'CategoryController');
Route::resource('page', 'PageController');
Route::resource('user', 'UserController');
Route::resource('slider', 'SliderController');
Route::resource('message', 'MessageController');
Route::resource('request', 'RequestController');
Route::resource('section', 'SectionController');
Route::resource('service', 'ServiceController');

Route::get('/slider/edit/{id}', 'SliderController@editSlider');