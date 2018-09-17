@extends('layouts.app')

@section('title', 'Edit Trainer')

@section('content')
    <h1>Editar Entrenadores</h1>
    <form class="form-group" method="POST" action="/trainers/{{ $trainer->slug }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ $trainer->name }}" required>
                </div>
                
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar">
                </div>
            </div>
            <div class="image-container col-sm-6">
                <img src="/images/{{ $trainer->avatar }}"
                    alt="{{ $trainer->name }}"
                    style="height: 200px; width: 300px; object-fit: contain; box-shadow: -1px 0px 18px 2px rgba(0, 0, 0, 0.53);">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" 
                    cols="30" 
                    rows="10" 
                    class="form-control">{{ $trainer->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection