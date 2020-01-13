<!DOCTYPE HTML>
<!--
  Massively by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <title>Signalement</title>
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
      <p class="logo">Signalement</p>
    </header>

    <!-- Nav -->
    <nav id="nav">
      <ul class="links">
        <li><a href="../public/index.php?route=article&idArt=<?=$comment->getArticle_id() ?> ">Retour a l'article</a></li>

      </ul>

    </nav>

    <!-- Main -->
    <div id="main">

      <!-- Post -->
      <section class="post">
        <header class="major">
        </header>

        <h4>Le commentaire signalé : " <?=$comment->getContent();?> "</h4>
        <p>Posté le <?= date('d.m.Y H:i', strtotime($comment->getDateAdded()));?> par <?= htmlspecialchars($comment->getUser()->getUserName());?> : <?= htmlspecialchars($comment->getUser()->getMail());?></p>

        <h4>Indiquez la raison du signalement</h4>
        <form method="post" action="../public/index.php?route=addReportComment">  
          <textarea id="reason" name="contentReport" required></textarea><br>
          <input type="hidden" id="commentId" name="commentId" value="<?=$comment->getIdComment()?>">
          <input type="hidden" id="articleId" name="articleId" value="<?=$comment->getArticle_id() ?>">
          <input type="submit" value="Validez le signalement" id="submit" name="submit">
        </form>              
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