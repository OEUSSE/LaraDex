@extends('layouts.app')

@section('title', 'Create Pokemons')

@section('content')
    <div class="row">
        <h1>Crea un Pokemon</h1>
        @include('common.errors')

        {!! Form::open(['route' => 'pokemons.store', 'method' => 'POST', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
        {!! Form::close() !!}
    </div>
@endsection
