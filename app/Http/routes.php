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

    Route::get(
        '/', function () {

        $title = 'Legendary - Home';
        return View::make('index')
            ->with('title', $title);
    }
    );

    Route::get(
        'register', function () {
        $title = "Legendary - Register";
        return View::make('register')
            ->with('title', $title); //esta cena dá aqui :/
    }
    );

    Route::get('/allchamp', 'ChampionController@getAllChampions');

    Route::get('/champion/{id}', 'ChampionController@getChampionByID');

    //Test Image cache layer
    Route::get("/image/{category}/{imageFile}","ImageController@getImage");

