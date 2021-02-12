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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



// partie user  front 
Route::patch('/user/{user}', 'UserController@update')->name('update');
Route::get('/user/{user}/edit', 'UserController@edit')->name('edit');
Route::put('/user/{user}', 'UserController@change_password')->name('change_password');


// formations
Route::resource('/formations', 'FormationController');
Route::get('/mes_formations', 'FormationController@mes_formations')->name('mes_formations')->middleware(['can:mesFormations']);

// participant
Route::resource('/participants', 'ParticipantController');
Route::get('/generate-recu-inscription/{id}','ParticipantController@generateRecuInscription')->name('generate-recu-inscription');


// partie admin 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::resource('/users', 'UsersController')->middleware(['can:user.manage'])->except(['show']);
    Route::resource('/sessions', 'SessionController')->middleware(['can:session.manage']);
});
