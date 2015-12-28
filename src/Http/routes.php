<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 12/22/15
 * Time: 8:00 AM
 */

Route::group(['prefix' => 'comments', 'namespace' => 'Usama\CommentPack'], function () {

    Route::get('/', ['uses' => 'Http\Controllers\Frontend\CommentController@index']);
    Route::post('/post/parent', ['as'=> 'postParentComment','uses' => 'Http\Controllers\Frontend\CommentController@postParentComment']);
    Route::post('/post/child', ['as' => 'postChildComment','uses' => 'Http\Controllers\Frontend\CommentController@postChildComment']);
    Route::get('/delete/child/{id}',['as' => 'deleteChildComment','uses' => 'Http\Controllers\Frontend\CommentController@deleteChildComment']);
    Route::get('/delete/parent/{id}',['as' => 'deleteParentComment','uses' => 'Http\Controllers\Frontend\CommentController@deleteParentComment']);

});