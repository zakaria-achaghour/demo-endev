<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
Route::get('/test',function (){
    return [
        'first'=> Crypt::decrypt('eyJpdiI6ImlwMVB3RlUrOUpTdm1XajdjT0RYREE9PSIsInZhbHVlIjoiaTZXSEIxZzl5NHlBTVg5amFLTG9uUT09IiwibWFjIjoiODFlYjQwNWY5MzBjZWJlZDI3YjlkNGViZjk5MGUyYjIyOWJkMjJjNzQ1MjBiMTJjZjBhNGQ2NGMxMGY5NDc4ZSJ9'),
        'second'=> Crypt::encrypt('secret')
        
    ] ;
});




Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



// partie user  front 
Route::patch('/user/{user}', 'UserController@update')->name('update');
Route::get('/user/{user}/edit', 'UserController@edit')->name('edit');
Route::put('/user/{user}', 'UserController@change_password')->name('change_password');


// formations
Route::resource('/formations', 'FormationController');
Route::get('/mes_formations', 'FormationController@mes_formations')->name('mes_formations')->middleware(['can:mesFormations']);
Route::put('/demande_attestation/{formation}', 'FormationController@demande_attestation')->name('demande_attestation');




// participant
Route::resource('/participants', 'ParticipantController');
Route::get('/generate-recu-inscription/{id}','ParticipantController@generateRecuInscription')->name('generate-recu-inscription');



// partie admin 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::resource('/users', 'UsersController')->middleware(['can:user.manage'])->except(['show']);
    Route::get('/attestation', 'UsersController@attestation')->name('attestation')->middleware(['can:session.manage']);
   
Route::post('/generate_attestation','UsersController@generate_attestation')->name('generate_attestation')->middleware(['can:session.manage']);;
    
    Route::resource('/sessions', 'SessionController')->middleware(['can:session.manage']);
});
