<?php

namespace App\Http\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;
use Session;

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

        return $this->connectAPI('POST', $param, 'auth', null);
    }

    public function postAPI($data, $endPoint)
    {
        $sessionData = Session('kucingku');

        $param = [
            'headers' => [
                'Authorization'      => 'Bearer '.$sessionData['access_token']
            ],
            'form_params' => $data
        ];

        return $this->connectAPI('POST', $param, 'data', $endPoint);
    }

    public function connectAPI($method, $param, $type, $endPoint)
    {
        $client = new Client();
        if ($method == 'POST') {
            if ($type == 'auth') {
                try {
                    $res = $client->request('POST', env('API_URL').'auth/login', $param);
                    $body = json_decode($res->getBody(), true);

                    // Simpan credential di session
                    Session::put('kucingku', $body['data']);

                    return $body;
                } catch (ClientException  $e) {
                    $response = $e->getResponse();

                    $detail = [
                        "status_code" => $response->getStatusCode(),
                        "reason" => $response->getReasonPhrase(),
                    ];

                    return $detail;
                }

            } elseif ($type == 'data') {
                try {
                    $res = $client->request('POST', env('API_URL').$endPoint, $param);
                    $body = json_decode($res->getBody(), true);

                    return $body;
                } catch (ClientException  $e) {
                    $response = $e->getResponse();

                    $detail = [
                        "status_code" => $response->getStatusCode(),
                        "reason" => $response->getReasonPhrase(),
                    ];

                    if ($detail['status_code'] == 401 && $detail['reason'] == "Unauthorized") {
                        return redirect()->route('login');
                    }

                    return $detail;
                }
            }
        }
    }
}
