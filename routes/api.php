<?php

use App\Http\Controllers\API\OptionAPIController;
use App\Http\Controllers\API\PermissionAPIController;
use App\Http\Controllers\API\RoleAPIController;
use App\Http\Controllers\API\UserAPIController;
use Illuminate\Support\Facades\Route;

Route::group(['as'=>'api.'], function () {

    Route::resource('options', OptionAPIController::class);



    Route::group(['middleware' => 'auth:api'], function () {

        Route::resource('permissions', PermissionAPIController::class);

        Route::resource('roles', RoleAPIController::class);

        Route::resource('users', UserAPIController::class);
        Route::get('user/add/shortcut/{user}', [UserAPIController::class,'addShortcut'])->name('users.add_shortcut');
        Route::get('user/remove/shortcut/{user}', [UserAPIController::class,'removeShortcut'])->name('users.remove_shortcut');

    });


});



Route::resource('tipoequipos', App\Http\Controllers\API\tipoequipoAPIController::class)
    ->except(['create', 'edit']);

Route::resource('equipos', App\Http\Controllers\API\equipoAPIController::class)
    ->except(['create', 'edit']);

Route::resource('clientes', App\Http\Controllers\API\clientesAPIController::class)
    ->except(['create', 'edit']);

Route::resource('servicios', App\Http\Controllers\API\serviciosAPIController::class)
    ->except(['create', 'edit']);