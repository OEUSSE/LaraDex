@extends('layouts.app')

@section('title', 'Lista de pokemons')

@section('content')
    <data-viewer-pokemons source="/api/pokemon" title="Lista de Pokemons" />
@endsection