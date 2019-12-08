<?php

use Illuminate\Http\Request;

Route::get('students', 'Api\\StudentController@index');
Route::post('students', 'ArticleController@store');
Route::get('student/{student}', 'Api\\StudentController@show');
Route::put('students/{student}', 'ArticleController@update');
Route::delete('students/{student}', 'ArticleController@delete');