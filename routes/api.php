<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
});

Route::get('/ApprenantSupprimer{id}', 'ApprenantController@delete');

Route::get('/FormateurSupprimer{id}', 'FormateurController@delete');

Route::get('/FormationSupprimer{id}', 'FormationController@delete');

Route::get('/GestionProfile{id}', 'ApprenantController@edit');

Route::get('/GestionProfile{id}', 'FormateurController@edit');

Route::post('/AjoutApprenant' ,'ApprenantController@store');

Route::post('/AjoutFormateur' ,'FormateurController@store');

Route::post('/UpdateProfile' ,'ApprenantController@Update');


Route::get('/ListApprenant' ,'ApprenantController@index');

Route::get('/ListApprenant/{{id}}' ,'ApprenantController@show');

Route::get('/ListFormateur' ,'FormateurController@index');

Route::get('/Formation' ,'FormationController@index');

Route::post('/AjoutFormation' ,'FormationController@store');

Route::get('/ConsulterFormation' ,'FormationController@index');

Route::get('/ConfirmerInscription{id}', 'ConsulterFormation@confirmer');

Route::get('/Inscription{id}', 'ConsulterFormation@store');

Route::post('/AjoutCours' ,'CoursController@store');

Route::get('/GestionFormation{id}', 'FormationController@edit');

Route::get('/updateFormation', 'FormationController@update');

Route::get('/Cours' ,'CoursController@index');

Route::get('/CoursSupprimer{id}', 'CoursController@delete');

Route::get('/GestionCours{id}', 'CoursController@edit');

Route::get('/updateCours', 'CoursController@update');

Route::post('/AjoutEmploi' ,'EmploiController@store');

Route::get('/Emploi' ,'EmploiController@index');

Route::get('/EmploiSupprimer{id}', 'EmploiController@delete');

Route::get('/GestionEmploi{id}', 'EmploiController@edit');

Route::get('/updateEmploi', 'EmploiController@update');

Route::get('/SuivieActivitees' ,'SuivieActivitees@index');

Route::get('/ProposerFormation' ,'FormationProposee@store');

Route::post('/Reclamer' ,'Reclamation@store');

Route::get('/Reclamation' ,'Reclamation@index');

Route::get('/DemanderMaterielle' ,'DemandeMaterielles@store');

Route::get('/ListAvis' ,'avisFormation@index');

Route::get('/AvisSupprimer{id}' ,'avisFormation@delete');

Route::get('/AvisCreate' ,'avisFormation@store');

Route::get('/paiement' ,'paiementController@index');

