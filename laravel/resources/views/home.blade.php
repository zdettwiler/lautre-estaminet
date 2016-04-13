@extends('layouts.main_layout')

@section('includes')
    <script src="js/layout.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var mapCanvas = document.getElementById('google-map');
            var mapOptions = {
                center: new google.maps.LatLng(50.428961, 2.833054),
                zoom: 20,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"hue":"#ff0000"},{"weight":0.4},{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#2b3f57"},{"weight":0.1}]},{"featureType":"poi","elementType":"all","stylers":[{"color":"#6c5b7b"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"on"},{"weight":"0.30"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"color":"#ffbaba"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#f55f77"},{"weight":"1.50"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"weight":0.8},{"visibility":"on"},{"hue":"#ff0000"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"weight":1.3},{"color":"#FFFFFF"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#f55f77"},{"weight":"0.90"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"color":"#ffffff"},{"weight":0.7}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#f55f77"},{"weight":"0.70"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":"0.50"}]},{"featureType":"transit.line","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#f3b191"}]}]
            }
            var map = new google.maps.Map(mapCanvas, mapOptions)
            var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(50.429, 2.833054),
                map: map,
                icon: iconBase + 'schools_maps.png'
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <link rel="stylesheet" media="screen" type="text/css" href="css/main.css">
@stop

@section('main-content')

    <div id="header-section" class="home-section">
        <img id="logo-home" src="img/logo_white.png"></div>
    </div>

    <div id="nos-produits" class="home-section">
        <h1>NOS PRO&shy;DUITS</h1>
        <a href="nos-produits" class="big-button-home">découvrir nos produits</a>
    </div>

    <div id="notre-concept" class="home-section">
        <h1>NOTRE CONCEPT</h1>
        <div class="home-section-blurb">
            <p>Les bénévoles et amis de l'association « le Lien » ont à coeur d'offrir à la population lensoise des perspectives d'épanouissement à travers l'ouverture de l'Autre Estaminet.
    Nous proposons un lieu convivial d'expression, d'écoute, de partage, d'échanges divers et variés intégrant plusieurs dimensions.</p>
        </div>
        <a href="notre-concept" class="big-button-home">lire davantage</a>
    </div>

    <div id="nos-evenements" class="home-section">
        <h1>NOS ÉVÉNE&shy;MENTS</h1>
        <div class="home-section-data">
            <h3>Prochainement à l'Autre Estaminet:</h3>
            @if($next_events != [])
                <ul>
                @foreach($next_events as $event)
                        <li>{{ $event->date }}: {{ $event->event }}</li>
                @endforeach
                </ul>
            @else
                <p>Rien à prévoir...</p>
            @endif

            <h3>Récemment à l'Autre Estaminet:</h3>
            <ul>
            @foreach($articles as $article)
                <li><a href="nos-evenements/{{ str_replace(' ', '', $article->get_date_string()) }}/{{ $article->slug }}">{{ $article->title }} ({{ $article->get_date_string() }})</a></li>
            @endforeach
            </ul>
        </div>
        <a href="nos-evenements" class="big-button-home">découvrir nos événements</a>
    </div>

    <div id="notre-expo-tournante" class="home-section">
        <h1>NOTRE EXPO TOUR&shy;NANTE</h1>
        <div class="home-section-data">
            <h3>Actuellement à l'Autre Estaminet:</h3>
            <ul>
                <li>Picasso</li>
                <li>Delacroix</li>
            </ul>
        </div>
        <a href="notre-expo-tournante" class="big-button-home">découvrir nos artistes</a>
    </div>

    <div id="notre-equipe" class="home-section">
        <h1>NOTRE ÉQUIPE</h1>
        <div class="home-section-blurb">
            <p>Elle est belle, joyeuse, régulièrement renouvelée, internationale, intergénérationnelle... Elle est l'âme de l'Autre Estaminet, c'est en partie elle qui fait de ce lieu un Autre Estaminet: vous l'aurez compris, il s'agit de notre équipe. Depuis l'ouverture en septembre 2011, ce sont des centaines d'heures de bénévolat investies au service des clients. Toujours aussi motivée, cette équipe est vraiment incroyable, avec des personnalités tellement différentes qui arrivent à s'harmoniser. En voici quelques spécimens!</p>
        </div>

        <a href="notre-equipe" class="big-button-home">rencontrer notre équipe</a>
    </div>

    <div id="nos-partenaires" class="home-section">
        <h1>NOS PARTE&shy;NAIRES</h1>
        <a href="nos-partenaires" class="big-button-home">rencontrer nos partenaires</a>
    </div>

    <div id="nous-trouver" class="home-section">
        <h1>NOUS TROUVER</h1>
        <div id="google-map"></div>
    </div>

    <div id="nous-contacter" class="home-section">
        <h1>NOUS CONTAC&shy;TER</h1>
        <div class="nous-contacter-section-wide">
            <h3>L'Autre Estaminet<br>
                5, Place Jean Jaurès<br>
                62300 - LENS<br>
                03 66 07 63 43<br>
                Ouvert du mardi au samedi de 11h00 à 18h30.</h3><br>

				<form method="POST" action="/nous-contacter">
				    {!! csrf_field() !!}

				    <p>Votre nom</p>
				    <input type="text" name="name" value="{{ old('name') }}"><br><br>

					<p>Votre adresse e-mail</p>
				    <input type="email" name="email" id="password"><br><br>

					<p>Votre message</p>
				    <textarea type="message" name="remember"></textarea><br><br>

					<button type="submit">Envoyer</button>
				</form>
        </div>
    </div>

@stop
