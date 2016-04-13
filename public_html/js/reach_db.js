function reach_db(form)
{
	$.ajax({
		type: 'POST',
		url: form.attr("action"),
		data: form.serializeArray(),
		beforeSend: function() {
			$("#edit-status").html("Connexion à la base de donnée...");
		},
		success: function(response) {
			console.log(response);
			$("#edit-status").html("&#10004; Mis à jour!").delay(5000);

		},
		complete: function () {
			// $('#loading').css('display', 'none');
		}
	});
}

$(function()
{
    $("input, textarea").change(function(){
		reach_db( $(this).parents('form') );
	});
});
