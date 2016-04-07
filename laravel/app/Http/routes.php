<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@home');
Route::get('/nos-produits', 'HomeController@nos_produits');
Route::get('/notre-concept', 'HomeController@notre_concept');
Route::get('/nos-evenements/{date?}/{slug?}', 'HomeController@nos_evenements');
// Route::get('/nos-evenements/slugs', 'HomeController@make_slug');
Route::get('/notre-expo-tournante', 'HomeController@notre_expo_tournante');
Route::get('/notre-equipe', 'HomeController@notre_equipe');
Route::get('/nos-partenaires', 'HomeController@nos_partenaires');


// ADMIN -----------------------------------------------------------------
Route::get('/admin', 'AdminController@dashboard');
