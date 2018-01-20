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

Route::get('/', function () {
    return view('index');
});

Route::group(["prefix" => "school"], function () {
    Route::get("/", "Admin\SchoolsController@index");

    Route::get("/create", "Admin\SchoolsController@create");
    Route::post("/create", "Admin\SchoolsController@postCreate");
    Route::get("/edit/{id}", "Admin\SchoolsController@edit");
    Route::get("/{id}", "Admin\SchoolsController@edit");
    Route::post("/edit/{id}", "Admin\SchoolsController@postEdit");
    Route::get("/delete/{id}", "Admin\SchoolsController@delete");
});

Route::group(["prefix" => "teacher"], function () {
    Route::get("/", "Admin\TeachersController@index");

    Route::get("/create", "Admin\TeachersController@create");
    Route::post("/create", "Admin\TeachersController@postCreate");
    Route::get("/edit/{id}", "Admin\TeachersController@edit");
    Route::get("/{id}", "Admin\TeachersController@edit");
    Route::post("/edit/{id}", "Admin\TeachersController@postEdit");
    Route::get("/delete/{id}", "Admin\TeachersController@delete");
});
