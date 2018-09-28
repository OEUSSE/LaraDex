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

            // Utilizando Cache para almacenar la data
            Cache::put('comments', $data, 20);
        }

        // Imprime el json con un formato específico de Laravel
        dd(Cache::get('comments'));
    }
}
