<?php
$_SESSION['id'] = $_GET['idComment'];
?>

<!DOCTYPE HTML>
<!--
  Massively by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <title>Modifier le commentaire</title>
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
      <p class="logo">Modifier le commentaire</p>
    </header>

    <!-- Nav -->
    <nav id="nav">
      <ul class="links">
        <li><a href="../public/index.php?route=backReportComment">Retour au signalement</a></li>

      </ul>

    </nav>

    <!-- Main -->
    <div id="main">

      <!-- Post -->
      <section class="post">
        <header class="major">
        </header>
        <section>


          <form method="post" action="../public/index.php?route=editComment">
            <label for="content">Contenu</label><br>  	
            <textarea id="content" name="content"><?= $comment->getContent();?>
          </textarea><br>
          <input type="hidden" id="id" name="id" value="<?=($_SESSION['id'])?>"><br>

          


          <input type="submit" value="Modifier commentaire" id="submit" name="submit">
          


        </form>
        <a href="../public/index.php?route=deleteComment&idComment=<?= htmlspecialchars($comment->getIdComment());?>"class="button large">Supprimer le commentaire.</a>
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

