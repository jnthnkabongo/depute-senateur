<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\ParlementaireController;
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

Route::get('accueil', [ParlementaireController::class, 'index'])->name('index');
Route::get('/sigle', [ParlementaireController::class, 'sigle']);
Route::get('/circonscription', [ParlementaireController::class, 'circonscription']);
Route::get('/fonction', [ParlementaireController::class, 'fonction']);
Route::get('/sexe', [ParlementaireController::class, 'sexe']);
Route::get('/province', [ParlementaireController::class, 'province']);
Route::post('/accueil', [ParlementaireController::class, 'rechercher'])->name('dodo');

Route::get('/', [loginController::class, 'index'])->name('connexion');
Route::post('/login', [loginController::class, 'create'])->name('login');

