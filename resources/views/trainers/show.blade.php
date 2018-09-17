@extends('layouts.app')

@section('title', 'Trainer')

@section('content')
    <h1>Entrenador {{ $trainer->slug }}</h1>
    <img style="height: 100px; width: 100px; background-color: lightgray; margin: 10px;"
        class="card-img-top rounded-circle mx-auto d-block" 
        src="/images/{{ $trainer->avatar }}"} 
        alt="Card image cap">
    <div class="text-center">
        <p>
            <h5 class="card-title">{{ $trainer->name }}</h5>
            {{ $trainer->description }}
        </p>
    </div>
    <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
@endsection 
