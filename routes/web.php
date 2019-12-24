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
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/custom',[
    'uses'=>'Login2Controller@login',
    'as'=>'login.custom',
]);




Route::get('inscrire',function(){
    return view('inscrire');

})->name('inscrire')->middleware('auth');



Route::post('inscrire','EtudiantController@store');

Route::get('liste',function(){
    return view('liste');
})->name('liste');

Route::get('liste','EtudiantController@index');

Route::get('notes',function(){
    return view('notes');

})->name('notes')->middleware('auth');



Route::post('notes','NotesController@store');

