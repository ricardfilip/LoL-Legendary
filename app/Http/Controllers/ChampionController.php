<?php

namespace App\Http\Controllers;

use App\Http\Controllers\iApiController;
use Illuminate\Routing\Controller as BaseController; //dunno da fuck this does xD cria um alias do routing\controller para ser usado no codigo como basecontroller

class ChampionController extends BaseController
{
    // public function getApiVersion(){
    //     //DaFuck does he want?
    // }
    public function getAllChampions(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?champData=image&api_key=".config('app.riotkey'));
        //curl_setopt($ch, CURLOPT_URL, "http://www.aeiou.pt");
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // NOT SECURE  nao faz verificação de certificados e cenas XD not important for now XD
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output contains the output string 
        $output = json_decode(curl_exec($ch),true); 
       // die(var_dump($output['champions']));
        $title = 'Champions';
        /*return View::make('champions')
        ->with(array('title'=>$title,
            'champions'=>$output));*/ 
return view('champions',['title'=>$title,
            'champions'=>$output['data']]);
    }



}