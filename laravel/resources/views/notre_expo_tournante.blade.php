@extends('layouts.main_layout')

@section('includes')
    {{-- <script src="js/layout.js"></script> --}}
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
    <link rel="stylesheet" media="screen" type="text/css" href="/css/notre_expo_tournante.css">
@stop

@section('main-content')
<div id="bg">
    <h1>NOTRE EXPO TOUR&shy;NANTE</h1>

    <div id="exhibitors-notices">
        <h3>Actuellement à l'Autre Estaminet:</h3>

	@if(!$artists->isEmpty())
        <ul>
        @foreach($artists as $artist)
                <li>{{ $artist->name }} jusqu'au {{ $artist->get_date_end_string() }}</li>
        @endforeach
        </ul>
    @else
        <p>Rien d'exposé pour le moment...</p>
    @endif


    </div>
</div>

    <div id="members-container">

    </div>

@stop
