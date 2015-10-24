<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller {
    private $endpointVersion = [
        "champion" => "v1.2",
        "static" => "v1.2",
        "status" => "v1.0"
    ];
    //private const JSON_CACHE_TIME = 1440; //minutes
    //TODO: Get Cache times as a constant Value from the .env file.

    public function getApiVersion() {
        //TODO: Fill this
    }

    /**
     * Builds the url from the provided parameters
     * @see https://developer.riotgames.com/api/methods
     * @param string $endpoint Endpoint to Query (name = to the one in the API documentaion)
     * @param string $region Region to Query
     * @param string $request Specific endpoint request
     * @param string $parameter Query Parameters to attach to the end of the URL
     * @return string Returns A Completed string to Query
     */
    public function builURL($endpoint, $region = "euw", $request = "", $parameter ="") {
        //TODO: Try use of http_build_url http://php.net/manual/en/function.http-build-url.php
        $url=""; //Init our url return
        $baseUrl = ($endpoint==="static-data"? $baseUrl= "https://" . "global" . ".api.pvp.net/api/lol":$baseUrl= "https://" . $region . ".api.pvp.net/api/lol");
        $apiKey= "&api_key=".config('app.riotkey');
        ($parameter !==""? $parameter = "?".$parameter : $parameter);
        switch ($endpoint) {
            case "champion":
                $url = $baseUrl.$region."/".$this->endpointVersion['champion']."/".$endpoint."/".$request.$parameter.$apiKey;
                break;
            case "static-data":
                $url = $baseUrl."/".$endpoint."/".$region."/".$this->endpointVersion['static']."/".$request.$parameter.$apiKey;
        }
        return $url;
    }

    public function apiCall ($url=""){
        //init cache
        $cacheKey = strtolower(md5($url));//TODO: find a more reliable way to handle cache keys
        if(Cache::has($cacheKey)){
            $responseContents = Cache::get($cacheKey);
            return $responseContents;
        } else {
            //Create a new Guzzle Client
            $client = new Client();
            $responseContents = ""; //Init our response return
            //Query the API
            $response = $client->get($url, ['verify' => false]); //TODO: Figure out how to verify this via SSL CERTIFICATES
            //Basic Error Handling Based on status Code.
            if($response->getStatusCode() === 200) { //If we get a successful response
                //Get the response body Stream
                $responseBody = $response->getBody();
                //Get the body Streams' contents
                $responseContents = $responseBody->getContents();
            }
            Cache::put($cacheKey,$responseContents,1);

        }
        return $responseContents;

    }

}