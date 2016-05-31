@extends('layouts.admin_layout')


@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
	<script src="/js/reach_db.js"></script>

	<script>
		$(function()
		{
			$("input[type=date]").change(function(){
				$("input[type=date]").val($(this).val());
			});
			$("input[name=time-start]").change(function(){
				$("input[type=time-start]").val($(this).val());
			});
			$("input[name=time-end]").change(function(){
				$("input[type=time-end]").val($(this).val());
			});

			$("button#fill-atelier-ecriture").click(function(){
				$("input[name=event]").val("Atelier Écriture");
				$("input[name=description]").val("Entrée libre! Venez nombreux, avec votre plus belle plume!");
				$("input[value=de-h-a-h]").prop("checked", true);
				$("input[name=time-start]").val("17:30:00");
				$("input[name=time-end]").val("19:00:00");
			});
			$("button#fill-cafe-poly").click(function(){
				$("input[name=event]").val("Café Polyglotte");
				$("input[name=description]").val("Venez échanger en anglais, espagnol, polonais, allemand, esperanto...");
				$("input[value=de-h-a-h]").prop("checked", true);
				$("input[name=time-start]").val("18:30:00");
				$("input[name=time-end]").val("21:00:00");
			});
			$("button#fill-soiree-sport").click(function(){
				$("input[name=event]").val("Soirée Sportive");
				$("input[name=description]").val("<a href='http://lautre-estaminet.com/nos-evenements/03OCT2014/nouveaute-rentree-2014-soiree-sportive-mensuelle'>Plus de détails</a> - Encore davantage auprès de Manu (06 99 07 83 78)");
				$("input[value=de-h-a-h]").prop("checked", true);
				$("input[name=time-start]").val("18:30:00");
				$("input[name=time-end]").val("21:00:00");
			});
			$("button#fill-soiree-karaoke").click(function(){
				$("input[name=event]").val("Soirée Karaoké");
				$("input[name=description]").val("Entrée Libre! Venez passer un bon moment en chantant!");
				$("input[value=a-partir-de-h]").prop("checked", true);
				$("input[name=time-start]").val("19:30:00");
			});
		});

	</script>
@stop

@section('main-content')
	<div id="loading-bar"></div>
	<h1>ÉVÉNE&shy;MENT #{{ $event->id }}</h1>
	<span id="edit-status" class="success">Prêt!</span>

	<form class="edit-table-item-form" method="POST" action="/admin/api/edit/event/{{ $event->id }}" data-db-table="event">
	    {!! csrf_field() !!}

		<div>
			<button type="button" class="small-button" id="fill-atelier-ecriture">Atelier Écriture</button>
			<button type="button" class="small-button" id="fill-cafe-poly">Café Polyglotte</button>
			<button type="button" class="small-button" id="fill-soiree-sport">Soirée Sportive</button>
			<button type="button" class="small-button" id="fill-soiree-karaoke">Soirée Karaoké</button>
	    </div><br>

	    <div>
	        <label for="name">Événement</label>
	        <input type="text" name="event" value="{{ $event->event }}">
	    </div><br>

		<div>
	        <label for="name">Description</label>
	        <input type="text" name="description" value="{{ $event->description }}">
	    </div><br>

		<div><p>
	        <input type="radio" name="date-type" value="a-partir-de-h" {{ $event->get_a_partir_de_h_status() }}>Le
			<input type="date" name="date-start" value="{{ $event->get_datetime_date_time('start', 'date') }}">
			à partir de <input type="time" name="time-start" value="{{ $event->get_datetime_date_time('start', 'time') }}"><br><br>

			<input type="radio" name="date-type" value="de-h-a-h" {{ $event->get_de_h_a_h_status() }}>Le
			<input type="date" name="date-start" value="{{ $event->get_datetime_date_time('start', 'date') }}"> de
			<input type="time" name="time-start" value="{{ $event->get_datetime_date_time('start', 'time') }}"> à
			<input type="time" name="time-end" value="{{ $event->get_datetime_date_time('end', 'time') }}"><br><br>

			<input type="radio" name="date-type" value="du-j-au-j" {{ $event->get_du_j_au_j_status() }}>Du
			<input type="date" name="date-start" value="{{ $event->get_datetime_date_time('start', 'date') }}"> au
			<input type="date" name="date-end" value="{{ $event->get_datetime_date_time('end', 'date') }}"><br><br>

	    </p></div><br>

	    <div>
	        {{-- <button type="submit">Envoyer</button> --}}
	    </div>
	</form>

@stop
