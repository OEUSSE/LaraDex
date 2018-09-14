@extends('layouts.app')

@section('title', 'Trainers')

@section('content')
    <div class="row">
    @foreach ($trainers as $trainer)
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/{{$trainer->avatar}}"} alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$trainer->name}}</h5>
                    <p class="card-text">Alguna cosa</p>
                    <a href="#" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
