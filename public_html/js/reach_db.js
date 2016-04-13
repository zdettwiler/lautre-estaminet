function reach_db(form)
{
	$.ajax({
		type: 'POST',
		url: form.attr("action"),
		data: form.serializeArray(),
		beforeSend: function() {
			// $("body").css('cursor', 'not-allowed');
			console.log('on it');
		},
		success: function(response) {
			console.log(response);

		},
		complete: function () {
			$('#loading').css('display', 'none');
			console.log('done');
			// $("body").css('cursor', 'auto');
		}
	});
}

$(function()
{
    $("input, textarea").change(function(){
		reach_db( $(this).parents('form') );
	});
});
