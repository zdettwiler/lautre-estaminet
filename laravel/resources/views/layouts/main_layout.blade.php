<!DOCTYPE>
<html>
	<head>
		<title>L'Autre Estaminet</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

		<link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
		<script src="js/jquery-1.11.3.min.js"></script>
		@yield('includes')
	</head>

	<body>
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
			<div class="links">
				<p>
					L'Autre Estaminet<br>
					5, place Jean Jaurès<br>
					62300 Lens<br>
					03 66 07 63 43<br><br>

					Ouvert du mardi au samedi de 11h00 à 18h30<br><br>
				</p>
			</div>

			<div class="links">
				<h3>Suivez-nous!</h3>
				<p>
					<a href="http://facebook.com/lautreestaminet">Facebook</a><br>
					<a href="http://twitter.com/lautreestaminet">Twitter</a><br>
					<a href="http://instagram.com/lautre_estaminet">Instagram</a><br>
					<a href="https://www.tripadvisor.fr/Restaurant_Review-g661384-d5779488-Reviews-L_Autre_Estaminet-Lens_Pas_de_Calais_Nord_Pas_de_Calais.html">TripAdvisor</a><br>
				</p>
			</div>

			<div id="designer-signature">
				<p>design par zed - avril 2016</p>
			</div>

		</div>
	</body>
</html>
