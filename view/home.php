<!DOCTYPE HTML>
<!--
    Massively by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="fr_FR">
<head>
    <title>Blog</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <!-- Intro -->
        <div id="intro">
            <h1>Billet simple pour l'Alaska</h1>
            <h3>Jean Forteroche</h3>
            <ul class="actions">
                <li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
            </ul>
        </div>

        <!-- Header -->
        <header id="header">
            <a href="../public/index.php" class="logo">Billet simple pour l'Alaska</a>
        </header>

        <!-- Nav -->
        <nav id="nav">
            <ul class="links">
                <?php

                if (!isset($_SESSION['userName'])) {
                    ?>                            
                    <li class="active"><a href="../public/index.php?route=signIn">Inscrivez vous</a></li>
                    <li><a href="../public/index.php?route=logIn">Connectez vous</a></li>
                    <?php
                }else{
                    ?>
                    <li class="active"><a>Bonjour <?= htmlspecialchars($_SESSION['userName']);?></a></li>
                    <li><a href="../public/index.php?route=logOut">Se deconnecter</a></li>
                    <?php
                }
                if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
                    ?>
                    <li><a href="../public/index.php?route=backMain">Back Office</a></li>
                    <?php
                }
                else if(isset($_SESSION['role']) && $_SESSION['role'] === 'user')
                {
                    ?>
                    <li><a href="../public/index.php?route=myProfil&userName=<?=($_SESSION['userName']) ?>">Mon profil</a></li>
                    <?php
                }                           
                ?>
            </ul>
        </nav>
        <!-- Main -->
        <div id="main">

            <!-- Featured Post -->
            <article class="post featured">
                <header class="major">
                    <span class="date"><?php setlocale(LC_ALL, "fr_FR.UTF8");
                    echo strftime("%A %d %B %Y ");?></span>
                    
                    <?php
                    foreach ($articles as $article) 
                    {
                    ?>

                        <h2><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>

                        <p>
                        <?php 
                            $content = $article->getContent();
                            echo substr($content, 3, 200);
                        ?> 
                            <a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>">... Continuez à lire.</a>

                        </p>

                    <?php
                    }
                    ?>

                </header>

            </article>

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