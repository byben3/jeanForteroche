<!DOCTYPE HTML>
<!--
    Massively by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>


    <title><?= htmlspecialchars($article->getTitle());?></title>
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
                    <h1><?= htmlspecialchars($article->getTitle());?></h1>
                    
                </header>

                <p><?= $article->getContent();?></p>

            </section>

        </div>

        <!-- Footer -->
        <footer id="footer">
            <?php
            if (isset($_SESSION['userName']) && $_SESSION['blacklist'] == "0") 
            {
                ?>
                <section>
                    <form method="post" action="../public/index.php?route=addComment">
                        <div class="fields">

                            <div class="field">
                                <label for="content">Nouveau commentaire</label>
                                <textarea name="content" id="content" values="<?php 
                                if(isset($post['content'])){ 
                                    echo $post['content'];}?>" required></textarea>
                                    <input type="hidden" id="user_id" name="user_id" value="<?=($_SESSION['user_id'])?>"><br>
                                    <input type="hidden" id="article_id" name="article_id" value="<?=$article->getId()?>"><br>
                                    <input type="submit" value="Envoyer" id="submit" name="submit" />
                                </div>
                            </div>
                                <!--
                                <ul class="actions">
                                    <li><input type="submit" value="Envoyer" id="submit" name="submit" /></li>
                                </ul>
                            -->
                        </form>
                    </section>
                    <?php
                }
                ?>

                <section class="split contact">
                    <?php
                    foreach ($comments as $comment)
                    {
                        ?>
                        <section class="alt">
                            <h4><?= htmlspecialchars($comment->getUser()->getUserName());?><br><?=date('d.m.Y H:i', strtotime($comment->getDateAdded()));?></h4>
                            <p><?=$comment->getContent();?><br><br><br>
                                
                                <?php
                                if (isset($_SESSION['userName']) && $_SESSION['blacklist'] == "0")    
                                {
                                    $key = array_search($comment->getIdComment(), array_column($report, 'commentId')); 
                                    if(is_int($key) === false)
                                    {
                                        ?>
                                        <a href="../public/index.php?route=reportComment&idComment=<?= htmlspecialchars($comment->getIdComment());?>">Signaler commentaire indésirable.</a></p>
                                        <?php
                                    }
                                    else
                                    {
                                        echo "Le comentaire a été signalé";
                                    }
                                }
                                ?>   

                            </section>

                            <?php
                        }
                        ?>
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