<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function getPosts(Request $request) {
        $client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            'time_out' => 2.0,
        ]);

        $response = $client->request('GET', 'posts'); // https://jsonplaceholder.typicode.com/posts
        
        $data = $response->getBody()->getContents();
        
        return json_decode($data);
    }

    public function createPost(Request $request) {
        $client = new Client();

        $r = $client->request('POST', 'https://jsonplaceholder.typicode.com/posts', [
            'json' => [
                'userId' => 1,
                'id' => 11,
                'title' => 'Nuevo post',
                'body' => 'Esto es un nuevo Post'
            ]   
        ]);
    }

    public function notifySlack (Request $request) {
        $client = new Client();

        $response = $client->request(
            'POST',
            'https://hooks.slack.com/services/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',
            [
                'json' => [
                    "text" => $request->text,
                    "channel" => $request->channel
                ]
            ]
        );
    }
}
