@extends('layouts.admin_layout')


@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/nos_evenements.css">
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
@stop

@section('main-content')
	<h1>ARTICLES</h1>

	<table>
		@foreach($articles as $article)
			<tr>
				<td>{{ $article->date }}</td>
				<td>{{ $article->title }}</td>
			</tr>
		@endforeach
	</table>

@stop
