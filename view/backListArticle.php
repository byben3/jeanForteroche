<!DOCTYPE HTML>
<!--
  Massively by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <title>Listes des articles</title>
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
      <p class="logo">Liste des articles</p>
    </header>

    <!-- Nav -->
    <nav id="nav">
      <ul class="links">
        <li><a href="../public/index.php?route=backMain">Retour au BackOffice</a></li>

      </ul>

    </nav>

    <!-- Main -->
    <div id="main">

      <!-- Post -->
      <section class="post">
        <header class="major">
          <?php
          foreach ($articles as $article) 
          {
            ?>
            <h3>ID <?= htmlspecialchars($article->getId());?> : <?= htmlspecialchars($article->getTitle());?> => <a href="../public/index.php?route=backEditArticle&idArt=<?= htmlspecialchars($article->getId());?>" class="button large">Modifier article</a> <a href="../public/index.php?route=deleteArticle&idArt=<?= htmlspecialchars($article->getId());?>" class="button large">Supprimer article</a> </h3>
            <?php
          }
          ?>


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
