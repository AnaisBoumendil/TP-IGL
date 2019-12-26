<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/// API Routes
/// Fichier qui contient les API routes


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/// POST API
/// API pour l'inscription des étudiants
Route::post('inscrire','EtudiantController@store');
/// GET API
/// API pour lister les étudiants
Route::get('liste','EtudiantController@get');
