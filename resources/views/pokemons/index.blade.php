@extends('layouts.app')

@section('title', 'Pokemons')

@section('content')
    <div class="row">
        <h1>Pokemons</h1>
        @foreach ($pokemons as $pokemon)
            <div class="col-sm-4">
                <div class="card text-center" style="width: 18rem; margin: 30px auto;">
                    <img style="height: 100px; width: 100px; background-color: lightgray; margin: 10px;"
                        class="card-img-top rounded-circle mx-auto d-block"
                        src="images/{{$pokemon->image}}"}
                        alt="Card image cap">
                    <div class="card-body text-left">
                        <h5 class="card-title">{{$pokemon->name}}</h5>
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
                            <li class="list-group-item text-center">
                                <a href="/pokemons/{{$pokemon->slug}}" class="btn btn-primary">Ver más</a>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
