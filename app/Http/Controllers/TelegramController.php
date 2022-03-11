<?php

namespace App\Http\Controllers;

use App\Traits\RequestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{

    // education  config telegram bot  => https://www.youtube.com/watch?v=5S6ujAqxkDk
    // first  commadn  => php artisan serve
    // second  command => ngrok http 8000

    use RequestTrait;

    public function webhook()
    {
        //Log::info(['route' => str_replace('http', 'https', url(route('index')))]);

        return $this->apiRequest('setWebHook', [
            'url' => str_replace('http', 'https', url(route('index')))
        ]) ? 'webhook was set' : 'Oops some thing wrong';


    }

    public function index()
    {
        $input = json_decode(file_get_contents('php://input'));
        return $this->apiRequest('sendMessage', [
            'chat_id' => $input->message->chat->id,
            'text' =>'salam'
        ]);
    }
}
