<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use LaraDex\Trainer;

class TrainerController extends Controller
{
    /**
     * GET METHOD
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::all();
        # como segundo parámetro recibe un los datos obenidos del modelo en string, se hace uso de compact
        # para enviarlos como un array
        return view('trainers.index', compact('trainers'));
    }

    /**
     * GET METHOD
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * POST METHOD
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avatar_name = 'default-avatar.jpg';
        $description = (!$request->input('description')) ? 'Sin descripción' : $request->input('description');
        if ($request->hasFile('avatar')) {
            // Creando un archivo
            $file = $request->file('avatar');
            // Dando al archivo un nombre único
            $avatar_name = time().$file->getClientOriginalName();
            // Mover a una carpeta a public/images
            $file->move(public_path().'/images/', $avatar_name);
        }

        $trainer = new Trainer(); // Instancia de Trainer Model
        // Asignar a la propiedad de name de trainer el valor que viene del request
        $trainer->name = $request->input('name');
        $trainer->avatar = $avatar_name;
        $trainer->description = $description;
        $trainer->save(); // Almacenar nuevo recurso

        return 'Save';

        // Obtener todos los datos enviados
        //return $request->all();
    }

    /**
     * GET METHOD PARAMS
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Utilizando Implicit Binding
     */
    public function show(Trainer $trainer)
    {
        //$trainer = Trainer::find($id);
        return view('trainers.show', compact('trainer'));
    }

    /**
     * GET METHOD PARAMS
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * PUT/PATCH METHOD
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * DELETE METHOD
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
