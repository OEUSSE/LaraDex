@extends('layouts.app')

@section('title', 'Pokemon')

@section('content')
  @include('common.success')
  <div class="card">
        <div class="card-header text-center">
            <h1>{{ $pokemon->name }}</h1>
            <img style="height: 100px; width: 100px; background-color: lightgray; margin: 10px;"
                class="card-img-top rounded-circle mx-auto d-block"
                src="/images/{{ $pokemon->image }}"}
                alt="Card image cap">
        </div>
        <div class="card-body text-center">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span class="label">Clasificación</span>
                    <span>{{ $pokemon->clasification }}</span>
                </li>
                <li class="list-group-item">
                    <span class="label">Peso</span>
                    <span>{{ $pokemon->weight }}</span>
                </li>
                <li class="list-group-item">
                    <span class="label">Altura</span>
                    <span>{{ $pokemon->height }}</span>
                </li>
                <li class="list-group-item">
                    <span class="label">Ranking</span>
                    <span>{{ $pokemon->ranking }}</span>
                </li>
                <li class="list-group-item">
                    <span class="label">Tipo</span>
                    <span>{{ $pokemon->type }}</span>
                </li>
            </ul>
        </div>
        <div class="card-footer buttons-container">
            <a href="/pokemons/{{$pokemon->slug}}/edit" class="btn btn-success btn-lg">Editar</a>

            <!-- Eliminar pokemon button -->
            {!! Form::open(['route' => ['pokemons.destroy', $pokemon->slug], 'method' => 'DELETE']) !!}
                {!! Form::submit('Eliminar', [ 'class' => 'btn btn-outline-danger btn-lg' ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection