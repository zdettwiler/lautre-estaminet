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
Route::get('nos-produits', 'HomeController@nos_produits');
Route::get('notre-concept', 'HomeController@notre_concept');
// Route::get('nos-evenements/{date?}/{slug?}', 'HomeController@nos_evenements');
Route::get('/nos-evenements/slugs', 'HomeController@make_slug');
Route::get('notre-expo-tournante', 'HomeController@notre_expo_tournante');
Route::get('notre-equipe', 'HomeController@notre_equipe');
Route::get('nos-partenaires', 'HomeController@nos_partenaires');
Route::get('nous-trouver', 'HomeController@nous_trouver');
Route::get('nous-contacter', 'HomeController@nous_contacter');
Route::post('nous-contacter', 'HomeController@post_nous_contacter');


// ADMIN -------------------------------------------------------------------------------------------
Route::get('admin',  ['middleware' => 'auth', 'uses' => 'AdminController@index']);

// Connection
Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('admin/logout', 'Auth\AuthController@getLogout');

// Route::get('admin/register', 'Auth\AuthController@getRegister');
// Route::post('admin/register', 'Auth\AuthController@postRegister');

// API
Route::get('admin/api/{function}/{object}/{id?}', 'APIController@get_query');
Route::post('admin/api/{function}/{object}/{id}', 'APIController@post_query');

// Articles
Route::get('admin/articles', 'AdminController@all_articles');
Route::get('admin/article/{id}', 'AdminController@edit_articles');
Route::get('admin/evenements', 'AdminController@all_events');
Route::get('admin/evenement/{id}', 'AdminController@edit_event');
Route::get('admin/benevoles', 'AdminController@all_volunteers');
Route::get('admin/benevole/{id}', 'AdminController@edit_volunteer');
Route::get('admin/artistes', 'AdminController@all_artists');
Route::get('admin/artiste/{id}', 'AdminController@edit_artist');
