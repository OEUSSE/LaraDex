@extends('layouts.app')

@section('title', 'Trainers List')

@section('content')
    <data-viewer-trainers source="/api/trainer" title="Trainer Data" />
@endsection
