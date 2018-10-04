<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CommentsController extends Controller
{
    public function getComments()
    {
        if (!Cache::has('comments')) {
            $url = "https://jsonplaceholder.typicode.com/comments";
            $data = file_get_contents($url);
            $expiresAt = now()->addMinutes(10);

            // Utilizando Cache para almacenar la data
            Cache::put('comments', $data, $expiresAt);
        }

        if (!Cache::has('id')) {
            Cache::put('id', 1, 10);
            Cache::increment('id', 10);
            Cache::decrement('id', 3);
        }

        if (!Cache::has('users')) {
            $url = 'https://jsonplaceholder.typicode.com/users';
            $data = file_get_contents($url);
            $expiresAt = now()->addMinutes(10);

            Cache::put('users', $data, $expiresAt);
        }

        // Imprime el json
        dd(Cache::get('users'));
    }
}
