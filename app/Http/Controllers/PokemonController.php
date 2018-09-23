<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use LaraDex\Pokemon;
use LaraDex\Http\Requests\StorePokemonRequest;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemons = Pokemon::all();
        return view('pokemons.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pokemons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePokemonRequest $request)
    {
        $slug = strtolower(str_replace(' ', '-', $request->input('name')));
        $image_name = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time().$file->getClientOriginalName();

            $file->move(public_path().'/images/', $image_name);
        }

        $pokemon = new Pokemon();
        $pokemon->name = $request->input('name');
        $pokemon->clasification = $request->input('clasification');
        $pokemon->weight = $request->input('weight');
        $pokemon->height = $request->input('height');
        $pokemon->ranking = $request->input('ranking');
        $pokemon->type = $request->input('type');
        $pokemon->image = $image_name;
        $pokemon->slug = $slug;
        $pokemon->save();

        return redirect()->route('pokemons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemons.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemons.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $slug = strtolower(str_replace(' ', '-', $request->input('name')));
        $image_name = $pokemon->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time().$file->getClientOriginalName();

            $file->move(public_path().'/images/', $image_name);
        }

        $pokemon->fill($request->except('image'));
        $pokemon->image = $image_name;
        $pokemon->slug = $slug;
        $pokemon->save();

        return redirect()->route('pokemons.show', [$pokemon])->with('status', 'Pokemon actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
        $file_path = public_path().'/images/'.$pokemon->image;
        \File::delete($file_path);
        $pokemon->delete();

        return redirect()->route('pokemons.index');
    }
}
