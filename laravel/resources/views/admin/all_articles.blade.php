@extends('layouts.admin_layout')


@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
@stop

@section('main-content')
	<h1>ARTICLES</h1>

	<table>
		@foreach($articles as $article)
			<tr>
				<td class="td_date">{{ $article->get_date_string() }}</td>
				<td><a href="articles/edit/{{ $article->id }}">{{ $article->title }}</a></td>
				<td><a href="articles/edit/{{ $article->id }}"><img src="/img/edit.png"></a></td>
				<td><a href="articles/delete/{{ $article->id }}"><img src="/img/delete.png"></a></td>
			</tr>
		@endforeach
	</table>

@stop
