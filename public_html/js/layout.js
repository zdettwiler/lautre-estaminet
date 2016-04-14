function home_sections_layout()
{
    $(".home-section").css('height', $(window).height());
}
function toggle_nav()
{
    if($(window).scrollTop()>50)
    {
        $("#nav-links").removeClass('open');


    }
    else
    {
        $("#nav-links").addClass('open');
    }
}

$(function()
{
    // home_sections_layout();
	// $(window).resize(home_sections_layout);
    toggle_nav();
    $(document).on('scroll', toggle_nav);

	// console.log(window.location.pathname);
	// console.log(window.location.href);
	$('div.nav-link > a').each(function() {
		$(this).attr('href', $(this).attr('href').replace("/", "#"));
	});
});
