@extends('layouts.app')

@section('title', 'Trainers Create')

@section('content')
    <h1>Crear Entrenadores</h1>
    <form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nombre">Avatar</label>
            <input type="file" name="avatar" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
