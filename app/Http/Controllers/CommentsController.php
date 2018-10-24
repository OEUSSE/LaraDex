<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use LaraDex\Trainer;
use LaraDex\Pokemon;

class CommentsController extends Controller
{
    public function getComments()
    {
        if (!Cache::has('comments')) {
            $url = 'https://jsonplaceholder.typicode.com/comments';
            $data = file_get_contents($url);
            $data = json_decode($data);
            $expiresAt = now()->addMinutes(10);

            Cache::put('comments', $data, $expiresAt);
        }

        if (!Cache::has('id')) {
            Cache::put('id', 1, 10);
            Cache::increment('id', 12);
            Cache::decrement('id', 3);
        }

        if (!Cache::has('users')) {
            $url = 'https://jsonplaceholder.typicode.com/users';
            $data = file_get_contents($url);
            $data = json_decode($data);
            $expiresAt = now()->addMinutes(10);

            Cache::put('users', $data, $expiresAt);
        }

        // Si el item no existe, creelo y setee los datos de la DB
        Cache::remember('trainers', 10, function() {
            return Trainer::all();
        });

        // Es igual a remember pero acá recordará el item para siempre
        Cache::rememberForever('pokemons', function() {
            return Pokemon::all();
        });

        return Cache::get('pokemons');
    }
}
