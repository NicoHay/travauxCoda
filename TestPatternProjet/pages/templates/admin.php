<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Projet</title>

  <link rel="stylesheet" href="Content/css/style.css">
  <link rel="stylesheet" href="Content/css/member.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

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
        <a href="index.php?p=" class="home">Home</a>
        <a href="index.php?p=logout" class="log">Deconnexion</a>
        <a href="index.php?p=login" class="log">Connexion</a>
        <a href="index.php?p=reset" class="log">Reset</a>
        <a href="#" class="iconsContact">Contact</a>
      </nav>
    </header>


    <!--  contenu de la page -->    <?=$content?>     <!-- contenu de la page -->  
    
    </div>


  <!-- <script src="js/parallax.js"></script> -->
  <script src="Content/js/stickyNav.js"></script>
  <script src="Content/js/menuResponsive.js"></script>
</body>

</html>