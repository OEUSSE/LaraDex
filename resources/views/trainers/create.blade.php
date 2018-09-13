@extends('layouts.app')

@section('title', 'Trainers Create')

@section('content')
  <h1>Crear Entrenadores</h1>
  <form class="form-group" method="POST" action="/trainers">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
@endsection
