<!DOCTYPE>
<html>
	<head>
		<title>L'Autre Estaminet</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<meta name="keywords" lang="fr" content="autre, estaminet, lens, jus, fruit, fruits, smoothie, smoothies, vitamine, vitamines, amitié,
			frais, fraicheur, amitié, prévention, couleurs, art, artiste, culture, santé, page, accueil, home, nos, produits, notre, concept,
			événéments, équipe, partenaires, où, somme-nous, sommes, nous, contacter, café, tiers, monde, légume, légumes, cookies, gateaux, thé,
			thés, tisane, boissons, fraiches, chaudes, sirop, commerce, équitable, choc, personnes, aide, manu, eric, patrick, iris, zachary,
			dimension, suicide, créativité, création, récréative, préventive, solidaire, actuel, bientôt, bientot, actualité,
			actualités, extra, plus, passé, passé, post, nouvelle, nouvelles, nouveauté, sensationel, galerie, photos, images, diaporama,
			téléphone, tél, e-mail, mail, place, jean, jaurès, situer, adresse, parking">

		<link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
		<script src="js/jquery-1.11.3.min.js"></script>
		@yield('includes')
	</head>

	<body>
		<div id="nav">
			<button></button>
			<div id="nav-links">
				<div class="nav-link"><a href="#nos-produits" style="color: #e45772">nos produits</a></div>
				<div class="nav-link"><a href="#notre-concept" style="color: #f1df00">notre concept</a></div>
				<div class="nav-link"><a href="#nos-evenements" style="color: #f7891d">nos événements</a></div>
				<div class="nav-link"><a href="#notre-expo-tournante" style="color: #2afa98">notre expo tournante</a></div>
				<div class="nav-link"><a href="#notre-equipe" style="color: #2ecb71">notre équipe</a></div>
				<div class="nav-link"><a href="#nos-partenaires" style="color: #ffd0de">nos partenaires</a></div>
				<div class="nav-link"><a href="#nous-trouver" style="color: #ff7599">nous trouver</a></div>
				<div class="nav-link"><a href="#nous-contacter" style="color: #9993db">nous contacter</a></div>
			</div>
		</div>

		@yield('main-content')
	</body>
</html>
