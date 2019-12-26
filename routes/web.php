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

// Web Routes
/** Ce fichier permet d'indiquer quel page retourner ou quel controlleur on doit appeler selon 
 **l'URL et le type de la requête (get ou post)

*/

/// si on a l'URL '/' et la requête get on retourne la vue 'welcome'
/// @returns view: la vue 'welcome'
Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login',function(){
    return view('/auth/login');

})->name('login');

/// si on a l'url /login/custum on fait appel à la fonction login de Login2Controller
Route::post('/login/custom',[
    'uses'=>'Login2Controller@login',
    'as'=>'login.custom',
]);


/**  si on a l'URL 'inscrire' et la requête get on retourne la vue 'inscrire', cette vue n'est accessible 
 * *qu'au utilisateur connectés à cause du middleware
*/
/// @returns view: la vue 'inscrire'

Route::get('inscrire',function(){
    return view('inscrire');

})->name('inscrire')->middleware('auth');



Route::post('inscrire','EtudiantController@store');

/**  si on a l'URL 'liste' et la requête get on retourne la vue 'liste', cette vue n'est accessible 
 * *qu'au utilisateur connectés à cause du middleware
*/
/// @returns view: la vue 'liste'
Route::get('liste',function(){
    return view('liste');

})->name('liste')->middleware('auth');

Route::get('liste','EtudiantController@index')->name('liste')->middleware('auth');



