<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Route::get('language/{language}', 'LanguageController@switch')->name('language.switch');
Route::get('/--moh', function (){
    dd('stp');
    Artisan::call('make:mail SendMailable');
    return 'done';
});
Route::view('/privacy', 'site.privacy');
Route::view('/contact-us', 'site.contact');
Route::get('language/{lang}', ['as' => 'language.switch', 'uses' => 'LanguageController@switchLang']);
Route::post('/add/comment', 'CommentController@storeComment')->name('storeComment');
Route::post('/contact/add', 'CommentController@addContact')->name('addContact');
Route::post('/request/add', 'CommentController@addRequest')->name('addRequest');
Route::post('/sendEmail', 'CommentController@sendEmail')->name('sendEmail');
Route::get('/assest/{d}', 'CommentController@assetComment');
Route::get('/', ['as' => 'root', 'uses' => 'PageController@getIndex']);
Route::get('a/{aSlug}', ['as' => 'article', 'uses' => 'PageController@getArticle']);
Route::get('p/{pSlug}', ['as' => 'page', 'uses' => 'PageController@getPage']);
Route::get('c/{cSlug}', ['as' => 'category', 'uses' => 'PageController@getCategory']);
Route::get('sitemap.xml', ['as' => 'sitemap', 'uses' => 'PageController@getSitemap']);
