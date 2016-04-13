@extends('layouts.admin_layout')


@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
	<script src="/js/reach_db.js"></script>
@stop

@section('main-content')
	<div id="loading-bar"></div>
	<h1>ARTISTE #{{ $artist->id }}</h1>
	<span id="edit-status" class="success">Fais tes modifs!</span>

	<form class="edit-table-item-form" method="POST" action="/admin/api/edit/artist/{{ $artist->id }}" data-db-table="artists">
	    {!! csrf_field() !!}

	    <div>
	        <label for="name">Nom</label>
	        <input type="text" name="name" value="{{ $artist->name }}">
	    </div><br>

	    <div>
	        <label for="date_start">À partir du <i>(AAAA-MM-JJ)</i></label>
	        <input type="text" name="date_start" value="{{ $artist->date_start }}">
	    </div><br>

		<div>
	        <label for="date_leave">Jusqu'au <i>(AAAA-MM-JJ)</i></label>
	        <input type="text" name="date_leave" value="{{ $artist->date_end }}">
	    </div><br>

	    <div>
	        {{-- <button type="submit">Envoyer</button> --}}
	    </div>
	</form>

@stop
