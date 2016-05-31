@extends('layouts.admin_layout')


@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
@stop

@section('main-content')
	<h1>ÉVÉNE&shy;MENTS</h1>
	<a class="big-button" style="float:right" href="/admin/api/add/event/">ajouter un événement</a>

	<table class="edit-table">
		@foreach($events as $event)
			<tr>
				<td>
					<a href="evenement/{{ $event->id }}">
						<h3>{{ $event->event }}</h3>
						(#{{ $event->id }}) {{ $event->get_date_string() }}
					</a><br>
					{!! $event->description !!}
				</td>
				<td><a href="evenement/{{ $event->id }}"><img src="/img/edit.png"></a></td>
				<td><a href="evenement/{{ $event->id }}"><img src="/img/delete.png"></a></td>
			</tr>
		@endforeach
	</table>

@stop
