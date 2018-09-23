@extends('layouts.app')

@section('title', 'Trainers Create')

@section('content')
    <h1>Crear Entrenadores</h1>
    @include('common.errors')
    {!! Form::open(['route' => 'trainers.store', 'method' => 'POST', 'files' => true]) !!}

        @include('trainers.form')

        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
