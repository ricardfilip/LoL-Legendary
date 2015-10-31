<?php

    namespace App\Http\Controllers;

    class ChampionController extends ApiController {

        public function getAllChampions() {
            $output = "";
            $url = $this->buildURL("static-data", "euw", "champion", "champData=image");
            $output = $this->apiCall($url); //Call the API
            $output = json_decode($output, true); //Return an array
            $output = $output['data']; //Dig into the 'data' element and discard the rest
            ksort($output);  //Sort by Key (Champion name) for prettiness

            $title = 'Select a Champion';
            return view('champions', ['title' => $title, 'champions' => ($output)]);
        }

        public function getChampionByID($championId) {
            $url = "";
            $url = $this->buildURL("static-data", "euw", "champion/" . $championId, "champData=all"); //TODO: Decently handle Query strings
            $champion = $this->apiCall($url);
            $champion = json_decode($champion, true);
            return view(
                'champion', [
                "title"    => $champion['name'], // *_*
                "champion" => $champion,
            ]
            );
        }
    }