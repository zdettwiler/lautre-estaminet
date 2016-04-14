@extends('layouts.main_layout')

@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/nos_evenements.css">
@stop

@section('main-content')
<div id="bg">
    <h1>NOS ÉVÉNE&shy;MENTS</h1>

    <div id="events-notices">
        <h3>Prochainement à l'Autre Estaminet:</h3>

		@if(!$next_events->isEmpty())
			<ul>
			@foreach($next_events as $event)
					<li><b>{{ $event->get_date_string() }}</b> {{ $event->event }}</li>
			@endforeach
			</ul>
		@else
			<p>Rien de prévu pour le moment...</p>
		@endif


    </div>
</div>

    <div id="articles-container">
    @if(!$articles->isEmpty())
        @foreach($articles as $article)
        <h3 class="article-title"><a href="{{ $article->date }}/{{ $article->slug }}">{{ $article->title }}</a></h3>
        <div class="article-date">
            {{ $article->get_date_string() }}
        </div>

        {!! $article->post !!}
        @endforeach
    @else
        <h3>Pas d'article n'a été publié ce jour...</h3>
    @endif

    </div>

@stop
