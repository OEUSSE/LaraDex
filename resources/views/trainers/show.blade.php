@extends('layouts.app')

@section('title', 'Trainer')

@section('content')
    @include('common.success')
    <div class="card">
        <div class="card-header text-center">
            <h1>{{ $trainer->name }}</h1>
            <img style="height: 100px; width: 100px; background-color: lightgray; margin: 10px;"
                class="card-img-top rounded-circle mx-auto d-block" 
                src="{{ $trainer->avatar }}"
                alt="Card image cap">
            <a href="/trainers/{{ $trainer->slug }}/pokemons" class="btn btn-dark">Ver los Pokemons de <span>{{ $trainer->name }}</span></a>
        </div>
        <div class="card-body text-center">
            <p>
                {{ $trainer->description }}
            </p>
        </div>
        <div class="card-footer buttons-container">
            <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-success btn-lg">Editar</a>
        
            <!-- Eliminar trainer button -->
            {!! Form::open(['route' => ['trainers.destroy', $trainer->slug], 'method' => 'DELETE']) !!}
                {!! Form::submit('Eliminar', [ 'class' => 'btn btn-outline-danger btn-lg' ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection 
