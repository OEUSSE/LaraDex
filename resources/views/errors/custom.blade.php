@extends('layouts.app')

@section('title', 'LaraDex Error Handling')

@section('content')
    <p>Exception details: <b>{{ $exception->getMessage() }}</b></p>
@endsection