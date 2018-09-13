<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;

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
        return 'Hola desde TrainerController';
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
        $trainer = new Trainer(); // Instancia de Trainer
        // Asignar a la propiedad de name de trainer el valor que viene del request
        $trainer->name = $request->input('name');
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
     */
    public function show($id)
    {
        //
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
