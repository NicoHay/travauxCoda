<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <title>Projet</title>

  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="stylesheet" href="../public/css/member.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



</head>

<body>
  <div id="site">
    <header id="header">

      <div id="logo"></div>
      <div id="marque">
        <h3>Mementum</h3>
      </div>
      <div id="bigmac">
        <div class="container menu">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </div>
      </div>
      <nav id="menu">
        <a href="index.php?p=home" class="home">home</a>
        <a href="index.php?p=register" class="register">S'inscrire</a>
        <a href="index.php?p=login" class="log">Connexion</a>
        <a href="#" class="download">Telécharger</a>
        <a href="#tarifs" class="details">Infos</a>
        <a href="#mail" class="contact">Contact</a>
      </nav>
    </header>


    
    <!--  contenu de la page -->    <?=$content?>     <!-- contenu de la page -->  


  </div>

  <!-- <script src="Content/js/parallax.js"></script> -->
  <script src="../public/js/stickyNav.js"></script>
  <script src="../public/js/menuResponsive.js"></script>
</body>

</html>


