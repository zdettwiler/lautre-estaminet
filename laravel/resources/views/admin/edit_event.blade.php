@extends('layouts.admin_layout')


@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
	<script src="/js/reach_db.js"></script>

	<script>
		$(function()
		{

			// NATIONALITY INPUT -------------------------------------------------------------------
			prev_val = $("#nationality-input input").val();

			$("#nationality-input input").keyup(function() {
				if( $(this).val() != prev_val)
				{

					$.ajax({
						type: 'GET',
						url: '/img/flags/list_flags.php',
						data: {
							keyword : $(this).val().toLowerCase().replace(/\b[a-z]/g, function(letter) {
								return letter.toUpperCase();
							})
						},

						beforeSend: function() {
							$('#nationality-input-img').attr('src', '/img/loading.gif');

						},
						success: function(response) {
							var response = $.parseJSON(response);
							$('#nationality-results-box').html('');
							$.each(response, function(index, value){
								$('#nationality-results-box').append("<div class='nationality-result-option'><span>"+ value +"</span></div>");
							});
						},
						complete: function () {
							$('#nationality-input-img').attr('src', '');
						}
					});

				}
				prev_val = $("#nationality-input input").val();
			});

			$('#nationality-results-box').on('mouseenter mouseleave', '.nationality-result-option', function(e){
				var country = $('span', this).html();

				if(e.type == 'mouseenter')
				{
					$('#nationality-input-img').attr('src', '/img/flags/'+ country +'.png');
					$("input[name='nationality']").val(country);
				}
				// if(e.type == 'mouseleave')
				// {
				// 	$('#nationality-input-img').attr('src', '');
				// }
			});

			$('#nationality-results-box').on('click', '.nationality-result-option', function(e){
				var country = $('span', this).html();
				$('#nationality-results-box').html('');
				$("input[name='nationality']").val(country).trigger("change");
			});

		});

	</script>
@stop

@section('main-content')
	<div id="loading-bar"></div>
	<h1>ÉVÉNE&shy;MENT #{{ $event->id }}</h1>
	<span id="edit-status" class="success">Fais tes modifs!</span>

	<form class="edit-table-item-form" method="POST" action="/admin/api/edit/volunteer/{{ $event->id }}" data-db-table="equipe">
	    {!! csrf_field() !!}

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
			<input type="date" name="date_start" value="{{ $event->get_datetime_date_time('start', 'date') }}">
			à partir de <input type="time" name="date_start" value="{{ $event->get_datetime_date_time('start', 'time') }}"><br><br>

			<input type="radio" name="date-type" value="de-h-a-h" {{ $event->get_de_h_a_h_status() }}>Le
			<input type="date" name="date_start" value="{{ $event->get_datetime_date_time('start', 'date') }}"> de
			<input type="time" name="time_start" value="{{ $event->get_datetime_date_time('start', 'time') }}"> à
			<input type="time" name="time_end" value="{{ $event->get_datetime_date_time('end', 'time') }}"><br><br>

			<input type="radio" name="date-type" value="du-j-au-j" {{ $event->get_du_j_au_j_status() }}>Du
			<input type="date" name="date_start" value="{{ $event->get_datetime_date_time('start', 'date') }}"> au
			<input type="date" name="date_start" value="{{ $event->get_datetime_date_time('end', 'date') }}"><br><br>

	    </p></div><br>

	    <div>
	        {{-- <button type="submit">Envoyer</button> --}}
	    </div>
	</form>

@stop
