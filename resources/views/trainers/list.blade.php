@extends('layouts.app')

@section('title', 'Trainers List')

@section('content')
    @php
        $doc = new DOMDocument();
        $html = "<b><i>Hey Óscar</i></b>";
        $doc->loadHTML("<?xml encoding='UTF-8'>");
        echo $doc->saveHTML();
    @endphp
    <data-viewer-trainers source="/api/trainer" title="Trainer Data" />
@endsection
