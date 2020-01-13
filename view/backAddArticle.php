<!DOCTYPE HTML>
<!--
  Massively by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <title>Nouvelle article</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
  <script src="tinymce/tinymce.min.js"></script>

  <script>tinymce.init({ selector:'textarea', 
    language: 'fr_FR', 
    min_height: 400,
    max_height: 400, 
    skin: "lightgray",
    menu: {format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'}},
    toolbar: 'undo redo cut copy paste pastetext selectall | formatselect fontselect fontsizeselect | bold italic underline | alignjustify alignleft aligncenter alignright | ',
    content_css: ['//fonts.googleapis.com/css?family=Indie+Flower'],
    font_formats: 'Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times; Verdana=verdana, serif'});
  </script>

</head>
<body class="is-preload">

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Header -->
    <header id="header">
      <p class="logo">Nouvel article</p>
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


          <form method="post" action="../public/index.php?route=backAddArticle">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" value="<?php
            if(isset($post['title'])){
              echo $post['title'];}
              ?>" required><br>
              <label for="content">Contenu</label>   
              <textarea id="content" name="content" required><?php 
              if(isset($post['content'])){ 
                echo $post['content']; } ?>
              </textarea><br>
              <input type="hidden" id="user_id" name="user_id" value="<?=($_SESSION['user_id'])?>">
              <input type="submit" value="Envoyer" id="submit" name="submit">
            </form>
            
          </header>

        </section>

      </div>

      <!-- Copyright -->
      <div id="copyright">
        <ul><li>&copy; 2018</li><li>Design: <a href="https://html5up.net">HTML5 UP</a> & Benjamin Fournie</li></ul>
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

