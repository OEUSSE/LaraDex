<?php

namespace LaraDex\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use LaraDex\Trainer;
use LaraDex\Http\Requests\StoreTrainerRequest;

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
    public function store(StoreTrainerRequest $request)
    {
        $slug = strtolower(str_replace(' ', '-', $request->input('name')));

        $avatar_name = 'default_avatar.png';
        $description = (!$request->input('description')) ? 'Sin descripción' : $request->input('description');

        if ($request->hasFile('avatar')) {
            // Creando un archivo
            $file = $request->file('avatar');
            // Dando al archivo un nombre único
            $avatar_name = time().$file->getClientOriginalName();
            $url_image = self::StoreInGoogle($avatar_name, $file);
        }

        $trainer = new Trainer(); // Instancia de Trainer Model
        // Asignar a la propiedad de name de trainer el valor que viene del request
        $trainer->name = $request->input('name');
        $trainer->avatar = $url_image;
        $trainer->description = $description;
        $trainer->slug = $slug;
        $trainer->save(); // Almacenar nuevo recurso

        return redirect()->route('trainers.index');
        
        //return 'Save';

        // Obtener todos los datos enviados
        //return $request->all();
    }

    /**
     * GET METHOD PARAMS
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Utilizado un Implicit Binding en el modelo
     */
    public function show(Trainer $trainer)
    {
        // Se puede ustilizar una sentencia sql como método del modelo Trainer
        // El método firstOrFail, lanza una excepción
        // $trainer = Trainer::where('slug', '=', $slug)->firstOrFail();

        return view('trainers.show', compact('trainer'));
    }

    /**
     * GET METHOD PARAMS
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * PUT/PATCH METHOD
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $slug = strtolower(str_replace(' ', '-', $request->input('name')));
        $avatar = $trainer->avatar;

        if ($request->hasFile('avatar')) {
            // Creando un archivo
            $file = $request->file('avatar');
            // Dando al archivo un nombre único
            $avatar_name = time().$file->getClientOriginalName();
            $url_image = self::StoreInGoogle($avatar_name, $file);
        }
        
        // fill actualiza los datos
        // El metodo execpt del request permite no pasar ciertos valores
        $trainer->fill($request->except('avatar', 'slug'));
        $trainer->avatar = $url_image;
        $trainer->slug = $slug;
        $trainer->save();

        // Se especifíca como segundo parámetro los datos del trainer
        return redirect()->route('trainers.show', [$trainer])->with('status', 'Entrenador actualizado correctamente');
        //return view('trainers.show', compact('trainer'));
    }

    /**
     * DELETE METHOD
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        // path del avatar
        $file_path = public_path().'/images/'.$trainer->avatar;
        // El método delete recibe un path
        // Se elimina la imagen
        \File::delete($file_path);
        // Se elimina el trainer
        $trainer->delete();
        
        return redirect()->route('trainers.index');
    }

    /**
     * Store in Google Cloud Storage
     * 
     * @param string $nombre
     * @param string $file
     */
    public static function StoreInGoogle($image_name, $file) {
        $disk = Storage::disk('gcs');
        
        if (!$disk->exists('trainers/'.$image_name)) {
            $disk->putFileAs('trainers', new File($file->getPathname()), $image_name, 'public');
        }

        return $disk->url('trainers/'.$image_name);
    }
}
