<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Back office</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<p class="logo">Back office</p>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li><a href="../public/index.php">Retour à l'accueil</a></li>
				<li><a href="../public/index.php?route=backAddArticle">Nouvel article</a></li>
				<li><a href="../public/index.php?route=backListArticle">Liste des articles</a></li>
				<li><a href="../public/index.php?route=backUser">Liste des utilisateurs</a></li>
				<li><a href="../public/index.php?route=backReportComment">Commentaires signalés</a></li>

			</ul>

		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Post -->
			<section class="post">
				<header class="major">
					<span class="date"><?php setlocale(LC_ALL, "fr_FR.UTF8");
					echo strftime("%A %d %B %Y ");?></span>
					<h1>Statistique du blog</h1>
					<p></p>
					<p>Nombre d'articles: <? echo sizeof($articles);  ?></p>
					<p>Nombre d'utilisateurs: <? echo sizeof($users);  ?></p>
					<p>Nombre de signalement: <? echo sizeof($report);  ?></p>
				</header>

			</section>

		</div>

		<!-- Copyright -->
		<div id="copyright">
			<ul><li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
		</div>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>
</html>
