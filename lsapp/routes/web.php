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



Route::get('/', 'PagesController@index');

// Route::get('/', function () {
//     // return view('welcome');
//     return 'hello viseth';
// });

// Route::get('/hello', function () {
//     // return view('welcome');
//     return 'hello hello';
// });

// Route::get('/users/{id}/{name}', function($id, $name){
//     return 'this is ' . $name . ' and the id is '. $id;
// });

// // Dynamic
// Route::get('/users/{id}', function($id){
//     return 'this is '.$id;
// });


Route::get('/about', function() {
    return view('pages.about');
});


