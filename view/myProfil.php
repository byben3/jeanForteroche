<!DOCTYPE HTML>
<!--
  Massively by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <title>Mon Profil</title>
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
      <p class="logo">Mon Profil</p>
    </header>

    <!-- Nav -->
    <nav id="nav">
      <ul class="links">
        <li><a href="../public/index.php">Retour a l'accueil</a></li>

      </ul>

    </nav>

    <!-- Main -->
    <div id="main">

      <!-- Post -->
      <section class="post">
        <header class="major">
        </header>
        <?php
        if(!empty($_SESSION['changePasswordSucces']))
        {
          echo $_SESSION['changePasswordSucces'];
        }
        ?>
        <h3>Changer le mot de passe</h3>
        <form method="post" action="../public/index.php?route=changePassword">
          <label for="password">Ancien mot de passe(*)</label>
          <input type="password" id="password" name="password" required>
          <label for="password">Nouveau mot de passe(*)</label>
          <input type="password" id="newPassword" name="newPassword" required>
          <label for="password">Confirmez le nouveau mot de passe(*)</label>
          <input type="password" id="confirmNewPassword" name="confirmNewPassword" required>
          <input type="hidden" id="user_id" name="user_id" value="<?=($_SESSION['user_id'])?>">
          <input type="hidden" id="userName" name="userName" value="<?=($_SESSION['userName'])?>">
          <input type="submit" value="Modifier le mot de passe" id="submit" name="submit" />
        </form><br>   
        <h3>Mon profil</h3>
        <p>pseudo: <?= $users->getUserName()?></p>
        <p>E-Mail: <?= $users->getMail()?></p>
        <p>Nom: <?= $users->getLastName()?></p>
        <p>Prenom: <?= $users->getFirstName()?></p>
        <p>role: <?= $users->getRole()?></p>
        <p>Date de naissance: <?= $users->getBirthday()?></p>
        <p>Ville: <?= $users->getCity()?></p>
        <p>Pays: <?= $users->getCountry()?></p>

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