@extends('layouts.app')

@section('title', 'Trainers Create')

@section('content')
    <h1>Crear Entrenadores</h1>
    <!-- Crear un form con Laravel Collective -->
    {!! Form::open(['route' => 'trainers.store', 'method' => 'POST', 'files' => true]) !!}
        
        @include('trainers.form')

        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <!---->
    <!--<form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>-->
@endsection
