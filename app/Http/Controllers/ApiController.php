<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class ApiController extends Controller {
    private $region = "euw";
    private $apiKey = "";
    private $endpointVersion = [
        "champion" => "v1.2",
        "static" => "v1.2",
        "status" => "v1.0"
    ];

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
        $baseUrl = "https://" . "global" . ".api.pvp.net/api/lol";
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

}