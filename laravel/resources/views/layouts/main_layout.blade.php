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
		<div id="fb-root"></div>
		<script>(function(d, s, id)
			{
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

		<div id="nav">
			<button></button>
			<div id="nav-links">
				<div class="nav-link"><a href="/nos-produits" style="color: #e45772">nos produits</a></div>
				<div class="nav-link"><a href="/notre-concept" style="color: #f1df00">notre concept</a></div>
				<div class="nav-link"><a href="/nos-evenements" style="color: #f7891d">nos événements</a></div>
				<div class="nav-link"><a href="/notre-expo-tournante" style="color: #2afa98">notre expo tournante</a></div>
				<div class="nav-link"><a href="/notre-equipe" style="color: #2ecb71">notre équipe</a></div>
				<div class="nav-link"><a href="/nos-partenaires" style="color: #ffd0de">nos partenaires</a></div>
				<div class="nav-link"><a href="/nous-trouver" style="color: #ff7599">nous trouver</a></div>
				<div class="nav-link"><a href="/nous-contacter" style="color: #9993db">nous contacter</a></div>
			</div>
		</div>

		@yield('main-content')


		<div id="footer">
			<div id="links">
				<h3>Liens Utiles</h3>
			</div>

			<div id="facebook">
				<h3>Facebook</h3>
				<div class="fb-page" data-href="https://www.facebook.com/lautreestaminet/" data-tabs="timeline" data-height="80%" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/lautreestaminet/"><a href="https://www.facebook.com/lautreestaminet/">L&#039;Autre Estaminet</a></blockquote></div></div>
			</div>

			<div id="tripadvisor">
				<h3>TripAdvisor</h3>
				<div id="TA_selfserveprop148" class="TA_selfserveprop">
					<ul id="hobw4u" class="TA_links 7OW1wMr">
					<li id="ktk3BmFECBe" class="DdlcSBOkXK">
					<a target="_blank" href="https://www.tripadvisor.fr/"><img src="https://www.tripadvisor.fr/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
					</li>
					</ul>
					</div>
					<script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=148&amp;locationId=5779488&amp;lang=fr&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2"></script>
				</div>
		</div>
	</body>
</html>
