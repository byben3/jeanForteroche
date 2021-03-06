<!DOCTYPE HTML>
<!--
    Massively by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Inscription</title>
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
                        <a href="../public/index.php" class="logo">Billet simple pour l'Alaska</a>
                    </header>

                <!-- Nav -->
                    <nav id="nav">
                        <ul class="links">
                            <li><a href="../public/index.php">Retour à l'accueil</a></li>
                            
                        </ul>

                    </nav>
                   

                <!-- Main -->
                    <div id="main">

                        <!-- Post -->
                            <section class="post">
                                <header class="major">
                                    <span class="date"><?php setlocale(LC_ALL, "fr_FR.UTF8");
                                        echo strftime("%A %d %B %Y ");?></span>
                                        
                                    <h1>Inscription</h1>
                                    <p>Pour vous s'inscrire veuillez remplir les champs ci-dessous.</p>
                                    <p>Champs obligatoires (*)</p>

                                </header>

                            </section>

                    </div>

                <!-- Footer -->
                    <footer id="footer">
                        <section>
                            <form method="post" action="../public/index.php?route=signIn">
                                <div class="fields">
                                    <div class="field">
                                        <label for="userName">pseudo(*)</label>
                                        <input type="text" id="userName" name="userName" value="<?php
                                            if(isset($post['userName'])){
                                            echo $post['userName'];}
                                            ?>" required>
                                    </div>
                                    <div class="field">
                                        <label for="password">mot de passe(*)</label>
                                        <input type="password" id="password" name="password" required>
                                    </div>
                                    <div class="field">
                                        <label for="password">Confirmez le mot de passe(*)</label>
                                        <input type="password" id="confirmPassword" name="confirmPassword" required>    
                                    </div>
                                    <div class="field">
                                        <label for="mail">e-mail(*)</label>
                                        <input type="text" id="mail" name="mail" value="<?php
                                            if(isset($post['mail'])){
                                            echo $post['mail'];}
                                            ?>" required>    
                                    </div>
                                    <div class="field">
                                        <label for="firstName">Prénom</label>
                                        <input type="text" id="firstName" name="firstName" value="<?php
                                            if(isset($post['firstName'])){
                                            echo $post['firstName'];}
                                            ?>" >                
                                    </div>
                                    <div class="field">
                                        <label for="lastName">Nom</label>
                                        <input type="text" id="lastName" name="lastName" value="<?php
                                            if(isset($post['lastName'])){
                                            echo $post['lastName'];}
                                            ?>" >           
                                    </div>
                                    <div class="field">
                                        <label for="birthday">date de naissance</label>
                                        <input type="date" id="birthday" name="birthday" value="<?php
                                            if(isset($post['birthday'])){
                                            echo $post['birthday'];}
                                            ?>" >            
                                    </div>
                                    <div class="field">
                                        <label for="city">Ville</label>
                                        <input type="text" id="city" name="city" value="<?php
                                            if(isset($post['city'])){
                                            echo $post['city'];}
                                            ?>" ><br>        
                                    </div>
                                    <div class="field">
                                        <label for="country">Pays</label>
                                        <input type="text" id="country" name="country" value="<?php
                                            if(isset($post['country'])){
                                            echo $post['country'];}
                                            ?>">
                                    </div>
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" value="S'inscrire" id="submit" name="submit" /></li>
                                </ul>
                            </form>
                        </section>

                    </footer>

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