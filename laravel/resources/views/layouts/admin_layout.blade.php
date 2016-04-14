<!DOCTYPE>
<html>
	<head>
		<title>ADMIN - L'Autre Estaminet</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<meta name="keywords" lang="fr" content="autre, estaminet, lens, jus, fruit, fruits, smoothie, smoothies, vitamine, vitamines, amitié,
			frais, fraicheur, amitié, prévention, couleurs, art, artiste, culture, santé, page, accueil, home, nos, produits, notre, concept,
			événéments, équipe, partenaires, où, somme-nous, sommes, nous, contacter, café, tiers, monde, légume, légumes, cookies, gateaux, thé,
			thés, tisane, boissons, fraiches, chaudes, sirop, commerce, équitable, choc, personnes, aide, manu, eric, patrick, iris, zachary,
			dimension, suicide, créativité, création, récréative, préventive, solidaire, actuel, bientôt, bientot, actualité,
			actualités, extra, plus, passé, passé, post, nouvelle, nouvelles, nouveauté, sensationel, galerie, photos, images, diaporama,
			téléphone, tél, e-mail, mail, place, jean, jaurès, situer, adresse, parking">
		<link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
		<link rel="stylesheet" media="screen" type="text/css" href="/css/admin.css">
		<script src="/js/jquery-1.11.3.min.js"></script>
		@yield('includes')
	</head>

	<body>
		<div id="admin-nav">
			<img id="nav-mini-logo" src="/img/logo-white.png">
			<a id="logout-button" href="/admin/logout">LOGOUT</a>
		</div>

		<div id="main-wrapper">
			@yield('main-content')
		</div>
	</body>
</html>
