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
              <a href="index.php?p=publicc.index" class="home"><h3>Mementum</h3></a>
      </div>
      <div id="bigmac">
        <div class="container menu">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </div>
      </div>
      <nav id="menu">

        <a href="index.php?p=users.register" class="register">Inscription</a>
        <a href="index.php?p=users.login" class="log">Connexion</a>
        <a href="index.php?p=publicc.index#" class="download">Telécharger</a>
        <a href="index.php?p=publicc.index#tarifs" class="details">Infos</a>
        <a href="index.php?p=publicc.index#mail" class="contact">Contact</a>
      </nav>
    </header>


    
    <!--  contenu de la page -->    <?=$content?>     <!-- contenu de la page -->  


  </div>

<!--  <script src="../public/js/parallax.js"></script> -->
  <script src="../public/js/stickyNav.js"></script>
  <script src="../public/js/MenuResponsive.js"></script>
</body>

</html>


