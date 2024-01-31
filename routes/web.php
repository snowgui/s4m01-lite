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

Route::get("guest/reset/password", "Guest\AuthCtrl@reset_passoword_index")->name("reset.passoword.index");

/* Após finalizar as rotas e views do make auth, comentar o trecho abaixo */
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    
    Route::get("/", "HomeController@index")->name("home");
    Route::get("/horario/trasmontano/{mes_select?}", "Horario\HorarioCtrl@index_tras")->name("horario.tras.index");
    Route::get("horario/edit/{id}/{date}", "Horario\HorarioCtrl@edit")->name("horario.edit");
    Route::put("/horario/update/{id}", "Horario\HorarioCtrl@update")->name("horario.update");

    Route::get("/usuarios","User\UserCtrl@index")->name("user.index");
    Route::get("/usuarios/create", "User\UserCtrl@create")->name("user.create");
    Route::post("/usuarios/store", "User\UserCtrl@store")->name("user.store");
    Route::get("/usuarios/edit/{id}","User\UserCtrl@edit")->name("user.edit");
    Route::put("/usuarios/update/{id}", "User\UserCtrl@update")->name("user.update");
    Route::delete("/usuarios/destroy/{id}","User\UserCtrl@destroy")->name("user.destroy");

    Route::get("/perfil/edit","User\UserCtrl@perfil_edit")->name("perfil.edit");
    Route::put("/perfil/update/{id}","User\UserCtrl@perfil_update")->name("perfil.update");

    Route::resource('CodeHelper', 'CodeHelper\CodeHelperCtrl');
    Route::get('getCode', 'CodeHelper\CodeHelperCtrl@getCode')->name("code.helper.getcode");

    Route::resource('CDHCategoria', 'CDHCategoria\CDHCategoriaCtrl');

    Route::resource('CDHLang', 'CDHLang\CDHLangCtrl');

    Route::resource('CDHFramework', 'CDHFramework\CDHFrameworkCtrl');

    Route::resource('CDHTool', 'CDHTool\CDHToolCtrl');

    Route::resource('CDHSo', 'CDHSo\CDHSoCtrl');

});