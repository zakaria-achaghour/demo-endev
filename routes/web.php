<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// partie user  front 
Route::patch('/user/{user}', 'UserController@update')->name('update');
Route::get('/user/{user}/edit', 'UserController@edit')->name('edit');
Route::put('/user/{user}', 'UserController@change_password')->name('change_password');




// partie admin 
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['can:user.manage'])->group(function(){

    Route::resource('/users', 'UsersController')->except(['show']);


});
