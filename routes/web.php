<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PanierController;

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
    return view('auth\login');
});

Auth::routes();

Route::get('/BonVoyage', [VoyageController::class, 'BonVoyage'])->name('voyage.BonVoyage');

///Admin
//Client

Route::get('/client', [ClientController::class, 'afficher'])->name('client.afficher');

Route::get('/client/ajouterClient', [ClientController::class, 'ajouter'])->name('client.ajouter');

Route::post('/client/enregistrer', [ClientController::class, 'enregistrer'])->name('client.enregistrer');

Route::get('/client/supprimer/{id}', [ClientController::class, 'supprimer'])->name('client.supprimer');  

Route::get('/client/modifier/{id}', [ClientController::class, 'modifier'])->name('client.modifier');  

Route::get('/client/detail/{id}', [ClientController::class, 'detailClient'])->name('client.detailClient');  

//Voyage

Route::get('/voyage', [VoyageController::class, 'afficher'])->name('voyage.afficher');

Route::get('/voyage/ajouterVoyage', [VoyageController::class, 'ajouter'])->name('voyage.ajouter');

Route::post('/voyage/enregistrer', [VoyageController::class, 'enregistrer'])->name('voyage.enregistrer');

Route::get('/voyage/supprimer/{id}', [VoyageController::class, 'supprimer'])->name('voyage.supprimer'); 

Route::get('/voyage/modifier/{id}', [VoyageController::class, 'modifier'])->name('voyage.modifier');  


Route::get('/panier/{id}', [PanierController::class, 'panier'])->name('panier.panier');

Route::post('/panier/ajouter', [PanierController::class, 'ajouterPanier'])->name('panier.ajouterPanier');

Route::get('/panier/supprimerVoyage/{id}/{idUser}', [PanierController::class, 'supprimerVoyage'])->name('panier.supprimerVoyage');

Route::get('/panier/paiment/{id}/{idUser}',[PanierController::class, 'paimentAfficher'])->name('panier.paimentAfficher');
