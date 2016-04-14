@extends('layouts.main_layout')

@section('includes')
    <script src="/js/masonry-3.3.2.min.js"></script>
    <script src="/js/imagesLoaded-3.2.0.min.js"></script>
    <script>
        $(function() {
            $('#equipe-permanent').masonry({
                // options
                itemSelector: '.equipe-volunteer',
                columnWidth: 220,
				isFitWidth: true
            });
        });
    </script>
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
    <link rel="stylesheet" media="screen" type="text/css" href="/css/notre_equipe.css">
@stop

@section('main-content')
<div id="bg">
    <h1>NOTRE ÉQUIPE</h1>

    <div id="equipe-descr">
        <p>Elle est belle, joyeuse, régulièrement renouvelée, internationale, intergénérationnelle... Elle est l'âme de l'Autre Estaminet, c'est en partie elle qui fait de ce lieu un Autre Estaminet: vous l'aurez compris, il s'agit de notre équipe. Depuis l'ouverture en septembre 2011, ce sont des centaines d'heures de bénévolat investies au service des clients. Toujours aussi motivée, cette équipe est vraiment incroyable, avec des personnalités tellement différentes qui arrivent à s'harmoniser. En voici quelques spécimens!</p>
    </div>
</div>

    <div id="equipe-permanent">

	@foreach($equipe_permanent as $volunteer_permanent)
        <div class="equipe-volunteer">
            <h3 class="equipe-volunteer-name"><img class="equipe-volunteer-flag" src="img/flags/{{ $volunteer_permanent->nationality }}.png" height="15px"> {{ $volunteer_permanent->name }}</h3>
            <img class="equipe-volunteer-img" src="img/benevoles/benevole_{{ $volunteer_permanent->id }}.png" width="150px" height="150px">
            <p class="equipe-volunteer-blurb">{{ $volunteer_permanent->description }}</p>
        </div>
    @endforeach

	@foreach($equipe as $volunteer)
        <div class="equipe-volunteer">
            <h3 class="equipe-volunteer-name"><img class="equipe-volunteer-flag" src="img/flags/{{ $volunteer->nationality }}.png" height="15px"> {{ $volunteer->name }}</h3>
			<p class="equipe-volunteer-date">{{ $volunteer->get_date_string('start') }} - {{ $volunteer->get_date_string('leave') }}</p>
            <img class="equipe-volunteer-img" src="img/benevoles/benevole_{{ $volunteer->id }}.png" width="150px" height="150px">
            <p class="equipe-volunteer-blurb">{{ $volunteer->description }}</p>
        </div>
    @endforeach

    </div>

@stop
