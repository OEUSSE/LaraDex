<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use Illuminte\Support\Facades\Cache;
use LaraDex\Pokemon;

class ListPokemonController extends Controller
{
    public function index()
    {
        return view('pokemons.list');
    }

    public function getData()
    {
        $model = Pokemon::searchPaginateAndOrder();
        $columns = Pokemon::$pokemon_columns;

        return response()->json([
            'model' => $model,
            'columns' => $columns
        ]);
    }
}
