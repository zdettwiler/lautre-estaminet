@extends('layouts.admin_layout')


@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
@stop

@section('main-content')
	<h1>BÉNÉVOLES</h1>
	<a class="big-button" style="float:right" href="/admin/api/add/benevole/">Ajouter un Bénévole</a>

	<table class="edit-table">
		@foreach($volunteers as $volunteer)
			<tr>
				<td><img src="/img/benevoles/benevole_{{ $volunteer->id }}.png" width="150px"></td>
				<td>
					<a href="benevole/{{ $volunteer->id }}"><h3>{{ $volunteer->name }} <img src="/img/flags/{{ $volunteer->nationality }}.png" height="20px"></h3>(#{{ $volunteer->id }})</a><br>
					{{ $volunteer->description }}
				</td>
				<td><a href="benevole/{{ $volunteer->id }}"><img src="/img/edit.png"></a></td>
				<td><a href="benevole/{{ $volunteer->id }}"><img src="/img/delete.png"></a></td>
			</tr>
		@endforeach
	</table>

@stop
