@extends('layouts.admin_layout')


@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
@stop

@section('main-content')

	<p>
		<a href="admin/articles">Articles ({{ $nb_articles }})</a><br>
		<a href="admin/evenements">Événements ({{ $nb_events }})</a><br>
		<a href="admin/benevoles">Bénévoles ({{ $nb_volunteers }})</a><br>
	</p>




@stop
