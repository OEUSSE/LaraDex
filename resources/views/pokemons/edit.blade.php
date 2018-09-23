@extends('layouts.app')

@section('title', 'Edit Pokemon')

@section('content')
  <h1>Editar Pokemon</h1>
    @include('common.errors')
    {!! Form::model($pokemon, ['route' => ['pokemons.update', $pokemon], 'method' => 'PUT', 'files' => true]) !!}
        <div class="image-container col-sm-6">
            <img src="/images/{{ $pokemon->image }}"
                alt="{{ $pokemon->name }}"
                style="height: 200px; width: 300px; object-fit: contain; box-shadow: -1px 0px 18px 2px rgba(0, 0, 0, 0.53);">
        </div>
        @include('pokemons.form')
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection