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

// Routes de l'authentification
Route::prefix('connexion')->group(function () {
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/', 'Auth\LoginController@login');
});

// Route de déconnexion
Route::post('deconnexion', 'Auth\LoginController@logout')->name('logout');

// Routes de l'enregistrement
Route::prefix('enregistrement')->group(function () {
    Route::get('/', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/', 'Auth\RegisterController@register');
});

// Routes de vérification de l'email
Route::prefix('email')->group(function () {
    Route::get('verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('resend', 'Auth\VerificationController@resend')->name('verification.resend');
});


// Password Reset Routes...
Route::prefix('passe')->group(function () {
    Route::get('change', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('change/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('change', 'Auth\ResetPasswordController@reset')->name('password.update');
});


// Page d'accueil
Route::get('/', 'HomeController@index')->name('home');  

Route::resource('logements', 'LogementController')
    ->parameters([
        'logements' => 'logement'
    ])->except([
        'index', 'show', 'destroy'
]);

// Routes d'accès aux logements hors connexion
Route::prefix('logements')->group(function () {  
    // Route pour afficher le formulaire de création des logements
    Route::get('create','LogementController@create')->name('logements.create');
    // Route pour enregistrer un logement
    Route::post('store','LogementController@store')->name('logements.store');
    // URL de recherche avec 1 paramètre optionnel
    Route::get('{region?}', 'LogementController@index')->name('logements.index');
    // Route de recherche en ajax 
    Route::post('recherche', 'LogementController@search')->name('logements.search')->middleware('ajax'); 
    // Route pour afficher un logement
    Route::get('voir/{logement}', 'LogementController@show')->name('logements.show');   
});

// Routes de gestion des images 
Route::middleware('ajax')->group(function () {   
    // Route permettant d'envoyer un message à celui qui a publié un logement   
    Route::post('message', 'UserController@message')->name('message');
    // Route permettant de télécharger une photo
    Route::post('images-save', 'UploadImagesController@store')->name('save-images');
    // Route permettant de supprimer une photo
    Route::delete('images-delete', 'UploadImagesController@destroy')->name('destroy-images');
    // Pour récupérer toutes les images téléchargées en cas de rechargement de la page
    Route::get('images-server','UploadImagesController@getServerImages')->name('server-images');
});
Route::group(['middleware' => 'revalidate'], function(){
Route::middleware(['auth', 'verified'])->group(function(){ 

    // Utilisateurs

    Route::get('user/create','UserController@create')->name('user.create')
    ->middleware('permission:user.create');

    Route::post('user/store','UserController@store')->name('user.store')
    ->middleware('permission:user.create');

    Route::get('user/all','UserController@allUsers')->name('user.all')
    ->middleware('permission:user.all');

    Route::get('user/show/{id}','UserController@show')->name('user.show')
    ->middleware('permission:user.show');

    Route::get('user/{id}/edit','UserController@edit')->name('user.edit')
    ->middleware('permission:user.edit');

    Route::put('user/update/{id}','UserController@update')->name('user.update')
    ->middleware('permission:user.edit');

    Route::delete('user/destroy/{id}','UserController@destroy')->name('user.destroy')
    ->middleware('permission:user.destroy');
    
    // Rôles

    Route::get('role/create','RoleController@create')->name('role.create')
    ->middleware('permission:role.create');

    Route::post('role/store','RoleController@store')->name('role.store')
    ->middleware('permission:role.create');

    Route::get('role/index','RoleController@index')->name('role.index')
    ->middleware('permission:role.index');      

    Route::get('role/show/{id}','RoleController@show')->name('role.show')
    ->middleware('permission:role.show');

    Route::get('role/{id}/edit','RoleController@edit')->name('role.edit')
    ->middleware('permission:role.edit');

    Route::put('role/update/{id}','RoleController@update')->name('role.update')
    ->middleware('permission:role.edit');

    Route::delete('role/destroy/{id}','RoleController@destroy')->name('role.destroy')
    ->middleware('permission:role.destroy');

    // Catégories

    Route::get('categorie/create','CategorieController@create')->name('categorie.create')
    ->middleware('permission:categorie.create');

    Route::post('categorie/store','CategorieController@store')->name('categorie.store')
    ->middleware('permission:categorie.create');

    Route::get('categorie/index','CategorieController@index')->name('categorie.index')
    ->middleware('permission:categorie.index');      

    Route::get('categorie/show/{id}','CategorieController@show')->name('categorie.show')
    ->middleware('permission:categorie.show');

    Route::get('categorie/{id}/edit','CategorieController@edit')->name('categorie.edit')
    ->middleware('permission:categorie.edit');

    Route::put('categorie/update/{id}','CategorieController@update')->name('categorie.update')
    ->middleware('permission:categorie.edit');

    Route::delete('categorie/destroy/{categorie}','CategorieController@destroy')->name('categorie.destroy')
    ->middleware('permission:categorie.destroy');

    // Régions

    Route::get('region/index','RegionController@index')->name('region.index')
    ->middleware('permission:region.index');  

    Route::get('region/show/{id}','RegionController@show')->name('region.show')
    ->middleware('permission:region.show');

    // Gestion des logements

    Route::prefix('user')->group(function () { 

        // Route permettant d'afficher le tableau de bord
        Route::get('/', 'UserController@index')->name('user.index')
        ->middleware('permission:user.index');

        Route::prefix('logements')->group(function () { 

            // Route permettant d'afficher la liste des logements à modérer
            Route::get('/', 'UserController@moderer')->name('user.moderer')
            ->middleware('permission:user.moderer');

            // Route pour approbation et refus de logements 
            Route::middleware('ajax')->group(function () {
                // Route permettant d'approuver un logement
                Route::post('approve/{logement}', 'UserController@approve')->name('user.approve');
                // Route permettant de refuser un logement
                Route::post('refuse', 'UserController@refuse')->name('user.refuse');
            });


            // Afficher les logements actifs
            Route::get('actives', 'UserController@actives')->name('user.actives')
            ->middleware('permission:user.actives');
            // Afficher les logements obsolètes
            Route::get('obsolete', 'UserController@obsoletes')->name('user.obsolete')
            ->middleware('permission:user.obsolete');
            // Afficher les logements en attente
            Route::get('attente', 'UserController@attente')->name('user.attente')
            ->middleware('permission:user.attente');

            // ici

            

            
            // Afficher la liste des logements obsolètes
            Route::get('obsoletes', 'UserController@obsoletes')->name('user.obsoletes');

            // Messages à modérer
            Route::prefix('messages')->group(function () {
                Route::get('/', 'UserController@messages')->name('user.messages');
                Route::post('approve/{message}', 'UserController@messageApprove')->name('user.message.approve');
                Route::post('refuse', 'UserController@messageRefuse')->name('user.message.refuse');  
            });

        });

    });

    // Route permettant d'afficher la liste des logements
    Route::get('logement/all','LogementController@all')->name('logement.all')
    ->middleware('permission:logement.all');    

    Route::prefix('user/logements')->group(function () {
        Route::middleware('ajax')->group(function () {
            Route::post('addweek/{logement}', 'UserController@addWeek')->name('user.addweek');
            Route::delete('destroy/{logement}', 'UserController@destroy')->name('user.destroy');
        });
    });
});

});














    








