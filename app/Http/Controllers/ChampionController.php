<?php

namespace App\Http\Controllers;
//cmo é que tu em java wtv consegues fazer este tipo de acessos? :o não é só dar extend e ficas logo com os metodos do pai? o.O  sim mas acho que com o extends tens qu redefiniri ometodo mas pera

class ChampionController extends ApiController {

    public function getAllChampions() {
        $url = $this->builURL("static-data","euw","champion","champData=image");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // NOT SECURE  nao faz verificação de certificados e cenas XD not important for now XD
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output contains the output string 
        $output = json_decode(curl_exec($ch), true);

        $title = 'Champions';

        return view('champions', ['title' => $title,
            'champions' => $output['data']]);
    }
}