@extends('layouts.app')

@section('title', 'Edit Trainer')

@section('content')
    <h1>Editar Entrenadores</h1>
    @include('common.errors')
    <!-- Form Model Binding -->
    {!! Form::model($trainer, ['route' => ['trainers.update', $trainer], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('avatar', 'Avatar') !!}
                    {!! Form::file('avatar', null) !!}
                </div>
            </div>
            <div class="image-container col-sm-6">
                <img src="/images/{{ $trainer->avatar }}"
                    alt="{{ $trainer->name }}"
                    style="height: 200px; width: 300px; object-fit: contain; box-shadow: -1px 0px 18px 2px rgba(0, 0, 0, 0.53);">
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Descripción') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'cols' => '30', 'rows' => '10']) !!}
        </div>
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <!--<form class="form-group" method="POST" action="/trainers/{{ $trainer->slug }}" enctype="multipart/form-data">
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
        <button type="submit" class="btn btn-primary">Actualizar</button>-->
    </form>
@endsection