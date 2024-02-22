<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait NeedExternalServies{

    function makeRequest($method, $url, $formParams = [], $headers = []){

        $client = new Client([
            'base_uri' => $this->base_uri,
        ]);

        if (isset($this->secret)){
            $headers['secret'] = $this->secret;
        }

        $response = $client->request($method, $url, ['form_params' => $formParams, 'headers' => $headers]);
        return $response->getBody()->getContents();
    }
}