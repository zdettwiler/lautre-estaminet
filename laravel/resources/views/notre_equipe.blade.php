@extends('layouts.main_layout')

@section('includes')
    <script src="/lautre-estaminet/public_html/js/masonry-3.3.2.min.js"></script>
    <script src="/lautre-estaminet/public_html/js/imagesLoaded-3.2.0.min.js"></script>
    <script>
        $(function() {
            $('#equipe-permanent').masonry({
                // options
                itemSelector: '.equipe-member',
                columnWidth: 190
            });
        });
    </script>
    <link rel="stylesheet" media="screen" type="text/css" href="/lautre-estaminet/public_html/css/main.css">
    <link rel="stylesheet" media="screen" type="text/css" href="/lautre-estaminet/public_html/css/notre_equipe.css">
@stop

@section('main-content')
<div id="bg">
    <h1>NOTRE ÉQUIPE</h1>

    <div id="equipe-descr">
        <p>Elle est belle, joyeuse, régulièrement renouvelée, internationale, intergénérationnelle... Elle est l'âme de l'Autre Estaminet, c'est en partie elle qui fait de ce lieu un Autre Estaminet: vous l'aurez compris, il s'agit de notre équipe. Depuis l'ouverture en septembre 2011, ce sont des centaines d'heures de bénévolat investies au service des clients. Toujours aussi motivée, cette équipe est vraiment incroyable, avec des personnalités tellement différentes qui arrivent à s'harmoniser. En voici quelques spécimens!</p>
    </div>
</div>

    <div id="equipe-permanent">

    @foreach($equipe as $member)
        <div class="equipe-member">
            <h3 class="equipe-member-name">{{ $member->name }}</h3>
            <img class="equipe-member-img" src="img/benevoles/benevole_{{ $member->id }}.png" width="150px" height="150px">
            <p class="equipe-member-blurb">{{ $member->descr }}</p>
        </div>
    @endforeach

    </div>

@stop
