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


Route::get('/', 'FrontController@index'); //Index

Route::get('/solde', 'FrontController@productByCategorie'); //Solde

Route::get('/categorie/Femme', 'FrontController@productByGirl'); //Femme

Route::get('/categorie/Homme', 'FrontController@productByBoy'); //Homme

Route::get('/products/create', 'FrontController@productCreate'); //Ajouter un produit

Route::post('/products/store', 'FrontController@store'); //Récupérer le produit ajouté

Route::get('/products/edit/{id}', 'FrontController@productEdit'); //Modifier un produit

Route::put('/products/update/{id}', 'FrontController@update'); //Récupérer le produit modifié

Route::get('/product/{id}', 'FrontController@show'); //Afficher un seul produit

Route::get('/admin', 'FrontController@admin')->name('admin'); //Dashboard

Route::get('products/destroy/{id}', 'FrontController@destroy'); //Supprimer un produit