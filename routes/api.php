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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'Auth\AuthController@register');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
    });
});

Route::group([
    'prefix' => 'publication'
], function () {
    Route::get('list-publication/{key}/{type}', 'PublicationController@listePublicationParType');
    Route::post('add-publication', 'PublicationController@EnregistrerPublication');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::post('update-publication', 'PublicationController@ModificationPublication');
        Route::post('delete-publication', 'PublicationController@SuppressionPublication');
    });
});

Route::group([
    'prefix' => 'type-publication'
], function () {
    Route::get('list-type-publication', 'TypePublicationController@ListTypePublication');
    Route::post('add-type-publication', 'TypePublicationController@EnregistrerTypPublication');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::post('update-type-publication', 'TypePublicationController@ModificationPublication');
        Route::post('delete-type-publication', 'TypePublicationController@SuppressionTypePublication');
    });
});

Route::group([
    'prefix' => 'situation'
], function () {
    Route::get('list-situation/{zone}/{date}', 'SituationController@situationParZone');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::post('add-situation', 'SituationController@EnregistrerSituation');
        Route::post('update-situation', 'SituationController@ModificationSituation');
        Route::post('delete-situation', 'SituationController@SuppressionSituation');
    });
});

Route::group([
    'prefix' => 'zone'
], function () {
    Route::get('list-zone', 'ZoneController@ListeZone');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::post('add-zone', 'ZoneController@EnregistrerZone');
        Route::post('update-zone', 'ZoneController@ModificationZone');
        Route::post('delete-zone', 'ZoneController@SuppressionZone');
    });
});

Route::group([
    'prefix' => 'projet'
], function () {
    Route::get('all-projet', 'ProjetController@ListProjet');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::post('add-projet', 'ProjetController@EnregistrerProjet');
        Route::post('update-projet', 'ProjetController@ModifierProjet');
        Route::post('delete-projet', 'ProjetController@SupprimerProjet');
    });
});

Route::group([
    'prefix' => 'expertise'
], function () {
    Route::get('list-expertise', 'ExpertiseController@ListeExpertise');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::post('add-expertise', 'ExpertiseController@EnregitrerExpertise');
        Route::post('update-expertise', 'ExpertiseController@ModifierExpertise');
        Route::post('delete-expertise', 'ExpertiseController@SupprimerExpertise');
    });
});

Route::group([
    'prefix' => 'volontaire'
], function () {
    Route::get('list-volontaire', 'VolontaireController@ListeVolontaire');
    Route::get('list-volontaire-par-expertise/{expertise}', 'VolontaireController@listVolontaireExpertise');
    Route::post('add-volontaire', 'VolontaireController@EnregistrerVolontaire');
    //Route::post('update-volontaire', 'VolontaireController@ModifierVolontaire');
    Route::post('delete-volontaire', 'VolontaireController@SupprimerVolontaire');
    Route::post('telechargerImage', 'VolontaireController@telechargerImage');
    Route::post('telechargerReference', 'VolontaireController@telechargerReference');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {

    });
});

Route::group([
    'prefix' => 'bibiotheque'
], function () {
    Route::get('list-bibiotheque/{key}/{type}', 'BibliothequeController@listeBibiothequeParType');
    Route::post('add-bibiotheque', 'BibliothequeController@EnregistrerBibiotheque');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
    });
});
