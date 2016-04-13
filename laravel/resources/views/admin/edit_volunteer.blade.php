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
	<h1>BÉNÉ&shy;VOLE #{{ $volunteer->id }}</h1>

	<form class="edit-table-item-form" method="POST" action="/admin/api/edit/volunteer/{{ $volunteer->id }}" data-db-table="equipe">
	    {!! csrf_field() !!}

	    <div>
	        <label for="name">Nom</label>
	        <input type="text" name="name" value="{{ $volunteer->name }}">
	    </div><br>

	    <div>
	        <label for="nationality">Nationalité (en anglais)</label>
			<div id="nationality-input">
	        	<input type="text" name="nationality" value="{{ $volunteer->nationality }}" autocomplete="off">
				<img id="nationality-input-img" src="/img/flags/{{ $volunteer->nationality }}.png" height="20px;">
				<div id="nationality-results-box">

				</div>
			</div>

	    </div><br>

		<div>
	        <label for="date_start">A commencé le</label>
	        <input type="text" name="date_start" value="{{ $volunteer->date_start }}">
	    </div><br>

		<div>
	        <label for="date_leave">Est parti le</label>
	        <input type="text" name="date_leave" value="{{ $volunteer->date_leave }}">
	    </div><br>

		<div>
	        <label for="description">Description</label>
	        <textarea name="description">{{ $volunteer->description }}</textarea>
	    </div><br>

	    <div>
	        {{-- <button type="submit">Envoyer</button> --}}
	    </div>
	</form>

@stop