@extends('layouts.app')

@section('title', 'Trainers')

@section('content')
    <div class="row">
    @foreach ($trainers as $trainer)
        <div class="col-sm-4">
            <div class="card text-center" style="width: 18rem; margin: 30px auto;">
                <img style="height: 100px; width: 100px; background-color: lightgray; margin: 10px;"
                    class="card-img-top rounded-circle mx-auto d-block"
                    src="images/{{$trainer->avatar}}"}
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$trainer->name}}</h5>
                    <p class="card-text">{{$trainer->description}}</p>
                    <a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
