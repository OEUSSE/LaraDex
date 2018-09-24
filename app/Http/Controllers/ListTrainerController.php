<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use LaraDex\Trainer;

class ListTrainerController extends Controller
{
    public function index()
    {
        return view('trainers.list');
    }

    public function getData()
    {
        // Obtengo los datos de los Trainers
        $model = Trainer::searchPaginateAndOrder();
        // Obtengo el array de columnas
        $columns = Trainer::$trainer_columns;

        /**
         * Devuelve un json con la clave "model" que contiene los datos de los trainers
         * y una llave "columns" que contiene las columnas
         */
        return response()->json([
            'model' => $model,
            'columns' => $columns
        ]);
    }
}
