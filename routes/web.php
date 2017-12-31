<?php


Auth::routes();

/**
 * Editor Routes
 */

Route::get('/', 'BoardController@showBoards');

Route::get('/editor', 'BoardController@getEditor');

Route::post('/board', 'BoardController@createBoard');
Route::post('/board/info', 'BoardController@setupInfo');
Route::post('/board/info/update', 'BoardController@updateInfo');

Route::delete('/board', 'BoardController@deleteBoard');
Route::post('/board/update', 'BoardController@updateBoard');
Route::post('/config/color', 'BoardController@updateColor');


/**
 * Admin Routes
 */
Route::get('/admin', 'AdminController@getIndex');


/**
 * Staff Routes
 */
Route::get('/staff', 'StaffController@getIndex');


