<?php

namespace App\Http\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7;
use Session;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
                'Authorization' => 'Bearer '.$sessionData['access_token']
            ],
            'form_params' => $data
        ];

        return $this->connectAPI('POST', $param, 'data', $endPoint);
    }

    public function postPubAPI($data, $endPoint)
    {
        $param = [
            'form_params' => $data
        ];

        return $this->connectAPI('POST', $param, 'data', $endPoint, 'public');
    }

    public function getPubAPI($data, $endPoint)
    {
        $param = [];
        return $this->connectAPI('GET', $param, 'data', $endPoint, 'public');
    }

    public function connectAPI($method, $param, $type, $endPoint, $mode = 'api')
    {
        $client = new Client(['headers' => ['Accept' => 'application/json']]);
        $apiURL = $mode == 'api' ? env('API_URL') : env('API_PUB_URL');

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
                    $res = $client->request('POST', $apiURL.$endPoint, $param);
                    $body = json_decode($res->getBody(), true);
                    return $body;
                } catch (ClientException  $e) {
                    $response = $e->getResponse();
                    $detail = [
                        "status_code" => $response->getStatusCode(),
                        "reason" => $response->getReasonPhrase(),
                    ];

                    if ($detail['status_code'] == 401 && $detail['reason'] == "Unauthorized") {
                        Session::flush();
                        return redirect('/login')->send();
                    }

                    return $detail;
                } catch (ServerException | HttpException $e) {
                    $response = $e->getResponse();

                    $message = json_decode($response->getBody()->getContents());

                    $detail = [
                        "status_code" => $response->getStatusCode(),
                        "reason" =>  $message->error ?? 'error',
                    ];

                    return $detail;
                }
            }
        }

        if ($method == 'GET') {
            try {
                $res = $client->request('GET', $apiURL . $endPoint, $param);
                $body = json_decode($res->getBody(), true);
                return $body;
            } catch (ClientException  $e) {
                $response = $e->getResponse();

                $detail = [
                    "status_code" => $response->getStatusCode(),
                    "reason" => $response->getReasonPhrase(),
                ];

                if ($detail['status_code'] == 401 && $detail['reason'] == "Unauthorized") {
                    Session::flush();
                    return redirect('/login')->send();
                }

                return $detail;
            } catch (ServerException | HttpException $e) {
                $response = $e->getResponse();
                $message = json_decode($response->getBody()->getContents());

                $detail = [
                    "status_code" => $response->getStatusCode(),
                    "reason" =>  $message->message ?? 'Error',
                ];
                return $detail;
            }
        }
    }
}
