<?php

namespace App\Traits;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait  RequestTrait
{

    private function apiRequest($method, $parameters=[])
    {

        $url = 'https://api.telegram.org/bot' . env('TELEGRAM_TOKEN') . '/' . $method;

//        Log::info(['url' =>  $url]);
//        Log::info(['method' =>$method]);
//        Log::info(['parameters' => $parameters]);

        $response = Http::post($url,$parameters);

        $response = json_decode($response,true);

        if ($response['ok'] === false){
            return false;
        }

        return $response;
    }

}
