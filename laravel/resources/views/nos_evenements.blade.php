@extends('layouts.main_layout')

@section('includes')
    {{-- <script src="js/layout.js"></script> --}}
    <link rel="stylesheet" media="screen" type="text/css" href="/lautre-estaminet/public_html/css/main.css">
    <link rel="stylesheet" media="screen" type="text/css" href="/lautre-estaminet/public_html/css/nos_evenements.css">
@stop

@section('main-content')
<div id="bg">
    <h1>NOS ÉVÉNE&shy;MENTS</h1>

    <div id="events-notices">
        <h3>Prochainement à l'Autre Estaminet:</h3>

    @if($next_events != [])
        <ul>
        @foreach($next_events as $event)
                <li>{{ $event->date }}: {{ $event->event }}</li>
        @endforeach
        </ul>
    @else
        <p>Rien à prévoir...</p>
    @endif


    </div>
</div>

    <div id="articles-container">
    @if($articles != [])
        @foreach($articles as $article)
        <h3 class="article-title"><a href="{{ $article->date }}/{{ $article->slug }}">{{ $article->title }}</a></h3>
        <div class="article-date">
            {{ date('d', strtotime($article->date)) }} {{ $article->month }}
        </div>

        {!! $article->post !!}
        @endforeach
    @else
        <h3>Pas d'article n'a été publié ce jour...</h3>
    @endif

    </div>

@stop
