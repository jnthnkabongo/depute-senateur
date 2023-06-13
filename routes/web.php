<?php

use App\Http\Controllers\CirconscriptionController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ParlementaireController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/accueil', [ParlementaireController::class, 'index'])->name('index');
Route::get('/sigle', [ParlementaireController::class, 'sigle']);
Route::get('/circonscription', [ParlementaireController::class, 'circonscription']);
Route::get('/fonction', [ParlementaireController::class, 'fonction']);
Route::get('/sexe', [ParlementaireController::class, 'sexe']);
Route::get('/province', [ParlementaireController::class, 'province']);
Route::post('/accueil', [ParlementaireController::class, 'rechercher'])->name('dodo');// Route de recherche a l'index
Route::post('/rechecherdepute',)->name('');
Route::get('/selectajax', [ParlementaireController::class, 'select']);
Route::get('/deputes', [ProvinceController::class, 'index'])->name('index-depute');
Route::get('/depute-provinciaux', [CirconscriptionController::class, 'index'])->name('index-dev-pro');
Route::post('api/fetch-state', [ParlementaireController::class, 'fetchstate'])->name('ajax-url');
Route::post('api/fetch-province', [ParlementaireController::class, 'fetchprovince']);//Chargement des circonscriptions par rapport 0 la province
Route::get('/recherchernom', [ParlementaireController::class, 'recherchernom'])->name('recherchernom');// Recherche des senateurs
//Action des senateurs fin

Route::get('rechercherdepute', [ProvinceController::class, 'rechercherdepute'])->name('rechercherdepute');


Route::get('/', [loginController::class, 'index'])->name('connexion');
Route::post('/login', [loginController::class, 'create'])->name('login');
Route::delete('logout', [loginController::class, 'logout'])->name('logout');


