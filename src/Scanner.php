<?php

namespace g4t\IDScanner;

use g4t\IDScanner\Helpers\Utilities;
use GuzzleHttp\Client;

class Scanner {

    private static $api_url;
    public function __construct()
    {
        $this->api_url = 'https://api.regulaforensics.com/api/';
    }


    public static function scan($images, $type = 'base64')
    {
        if($type == 'base64') {
            $json = Utilities::base64($images);
        } else if($type == 'files') {
            $json = Utilities::files($images);
        } else {
            return response()->json(["message" => "wrong file type", "allow" => [ "files", "base64" ]], 401);
        }
        return self::sendRequest($json);
    }


    public static function sendRequest($json)
    {
        $client = new Client();
        $response = $client->post('https://api.regulaforensics.com/api/process?logRequest=false', [
            'json' => $json
        ]);
        $data = json_decode($response->getBody(), true);
        $result = Utilities::returnData($data);
        return $result;
    }



}
