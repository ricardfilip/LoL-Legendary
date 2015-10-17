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

Route::get('/', function () {
   
   $title = 'Legendary - Home';
   return View::make('index')
          ->with('title',$title);
});

Route::get('register',function(){
  $title = "Legendary - Register";
  return View::make('register')
          ->with('title',$title); //esta cena dá aqui :/
});

Route::get('/allchamp','ChampionController@getAllChampions');

Route::get('/{summoner_name}', function ($summoner_name) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/{$summoner_name}?api_key=".config('app.riotkey'));
    //curl_setopt($ch, CURLOPT_URL, "http://www.aeiou.pt");
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // NOT SECURE  nao faz verificação de certificados e cenas XD not important for now XD
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // $output contains the output string 
    $output = curl_exec($ch);
    $summoner = json_decode($output);
    $summoner = $summoner->$summoner_name;
    return view('welcome', [
        'summoner_name' => $summoner->name,
        'summoner_level' => $summoner->summonerLevel,
        'summoner_selfie' => $summoner->profileIconId
    ]);
});

