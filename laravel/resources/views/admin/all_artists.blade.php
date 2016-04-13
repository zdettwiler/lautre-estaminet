@extends('layouts.admin_layout')


@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
@stop

@section('main-content')
	<h1>ARTISTES</h1>

	<table class="edit-table">
		@foreach($artists as $artist)
			<tr>
				<td>
					<a href="artiste/{{ $artist->id }}">
						<h3>{{ $artist->name }}</h3>
						({{ $artist->id }})
					</a><br>
					{{-- {{ $artist->description }} --}}
				</td>
				<td><a href="artiste/{{ $artist->id }}"><img src="/img/edit.png"></a></td>
				<td><a href="artiste/{{ $artist->id }}"><img src="/img/delete.png"></a></td>
			</tr>
		@endforeach
	</table>

@stop
