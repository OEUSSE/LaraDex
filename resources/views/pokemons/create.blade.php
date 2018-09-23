@extends('layouts.app')

@section('title', 'Create Pokemons')

@section('content')
    <h1>Crea un Pokemon</h1>
    @include('common.errors')

    {!! Form::open(['route' => 'pokemons.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image', 'Imagen') !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('clasification', 'Clasificación') !!}
            {!! Form::text('clasification', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('weight', 'Peso') !!}
            {!! Form::number('weight', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('height', 'Altura') !!}
            {!! Form::number('height', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('ranking', 'Ranking') !!}
            {!! Form::number('ranking', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Tipo') !!}
            {!! Form::text('type', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
