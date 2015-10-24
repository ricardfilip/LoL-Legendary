<?php

    namespace App\Http\Controllers;

    use GuzzleHttp\Client;
    use Illuminate\Routing\Controller;
    use Storage;
    use Illuminate\Support\Facades\Cache;


    class ImageController extends Controller {
        public function getImage($category, $image) {
            $ddragonBaseUrl = "http://ddragon.leagueoflegends.com/cdn/5.20.1/img/" . $category . "/" . $image;
            $status = 200;
            $contentType = "";
            $folderPath = $category . "/";
            $imagePath = $folderPath . $image;
            $responseContents ="";
            $contentTypeCacheKey="ctype_".$imagePath;

            //Check for directory of ddragon storage if it doesnt exist we create it
            if(!Storage::exists($folderPath)) {
                Storage::makeDirectory($category);

            } else { //We assume the directory exists if we hit this point

                //Check if the file exists on cache
                if(Storage::exists($imagePath)) {
                    $responseContents= Storage::get($imagePath);
                    if(Cache::has($contentTypeCacheKey)) {
                        Cache::get($contentTypeCacheKey);
                    } else {
                        $contentType = Storage::mimeType($imagePath); //WARNING: internally uses phpfileinfo extension
                        //Cache the content type to avoid repetitive disk access for file info
                        Cache::put($contentTypeCacheKey,$contentType,1400);
                    }
                } else { //Nop, lets query for it and cache it on app storage
                    //TODO: Make guzzle be handled by laravel to avoid code repetion,repetion,repetion...
                    //Create a new Guzzle Client
                    $client = new Client();
                    $responseContents = ""; //Init our response return
                    //Query the API
                    $response = $client->get($ddragonBaseUrl, ['verify' => false]); //TODO: Figure out how to verify this via SSL CERTIFICATES
                    //get our contentType for proper header filetype
                    $contentType = $response->getHeader("Content-Type");

                    //We cache here too without any checks because the request is coming from guzzle
                    Cache::put($contentTypeCacheKey,$contentType,1400);

                    //Basic Error Handling Based on status Code.
                    if($response->getStatusCode() === 200) { //If we get a successful response
                        //Get the response body Stream
                        $responseBody = $response->getBody();
                        //Get the body Streams' contents
                        $responseContents = $responseBody->getContents();
                        Storage::put($imagePath,$responseContents);
                    }
                }
            }

            return response($responseContents, $status)->header('Content-Type', $contentType);
        }
    }