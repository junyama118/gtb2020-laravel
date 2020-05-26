<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;

class SunabarController extends Controller
{
    //
    //     /**
    //  * @param Request $request
    //  * @return Response
    //  */
    // public function store(Request $request)
    // {
    //     $task = new \App\Task;
    //     $task->description = $request->input('description');
    //     $task->save();
    //     return response('OK', 200, [
    //         'Location' => url('/api/tasks/' . $task->id)
    //     ]);
    // }

    /**
     */
    public function get()
    {
        $base_url = ' https://api.sunabar.gmo-aozora.com/personal/v1/';
        $client = new \GuzzleHttp\Client([
            'base_uri' => $base_url,
            //\GuzzleHttp\RequestOptions::VERIFY => false
        ]);
        $method = 'GET';
        $uri = 'accounts/balances';
        $response_url = $base_url . $uri;
        echo $response_url;
        $token = '';
        $response = $client->request($method, $uri ,[
            'headers' => [
                'Accept' => 'application/json',
                'x-access-token' => $token
            ]
        ]);
        $response_body = (string) $response->getBody();
        echo $response_body;
        echo $response->getStatusCode();
    }
}

