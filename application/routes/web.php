<?php

/**
 * Welcome to Luthier-CI!
 *
 * This is your main route file. Put all your HTTP-Based routes here using the static
 * Route class methods
 *
 * Examples:
 *
 *    Route::get('foo', 'bar@baz');
 *      -> $route['foo']['GET'] = 'bar/baz';
 *
 *    Route::post('bar', 'baz@fobie', [ 'namespace' => 'cats' ]);
 *      -> $route['bar']['POST'] = 'cats/baz/foobie';
 *
 *    Route::get('blog/{slug}', 'blog@post');
 *      -> $route['blog/(:any)'] = 'blog/post/$1'
 */


Route::group('/', ['namespace' => 'Frontend'], function(){
    Route::get('/','HomeController@index')->name('home.index');
    Route::get('/wilayah','HomeController@wilayah')->name('home.wilayah');
    Route::get('/wilayah/{wilayah_id}/tipe','HomeController@tipe')->name('home.tipe');
    Route::Get('/wilayah/{wilayah_id}/tipe/{tipe_id}','HomeController@result')->name('home.result');
    Route::get('/input','HomeController@input')->name('home.input');
    Route::post('/input/save','HomeController@inputSave')->name('home.input.save');
});

require __DIR__ . '/admin.php';

Route::set('404_override', function(){
    show_404();
});

Route::set('translate_uri_dashes',FALSE);