<?php

namespace App\Http\Traits;

use GuzzleHttp\Client;
use Cookie;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;


trait AuthTraits
{
    public function auth($data)
    {
        $param = [
            'form_params' => [
                'email' => $data['email'],
                'password' => $data['password']
            ]
        ];
        return $this->connectAPI('POST', $param, 'auth');
    }

    public function connectAPI($method, $param, $type) 
    {
        $client = new Client();
        if ($method == 'POST') {
            if ($type == 'auth') {
                try {
                    $res = $client->request('POST', 'http://unisa-laravel.test/api/auth/login', $param);
                    $body = json_decode($res->getBody(), true);
                } catch (ClientException  $e) {
                    $response = $e->getResponse();
                    return $response->getBody()->getContents();
                }   

                cookie('kucingku', $body['access_token'], $body['expires_in']);

                return true;
            }
        }
    }
}