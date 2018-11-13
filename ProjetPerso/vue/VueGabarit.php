<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <title>Projet</title>

  <link rel="stylesheet" href="Content/css/style.css">
    <link rel="stylesheet" href="Content/css/member.css">
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
<a href="index.php?action=" class="home">home</a>
<a href="index.php?action=register" class="register">S'inscrire</a>
<a href="index.php?action=login" class="log">Connexion</a>
<a href="#" class="download">Telécharger</a>
<a href="#" class="details">Infos</a>
<a href="#" class="contact">Contact</a>
</nav>
</header>
                        <?php echo $contenu;   // contenu de ma page 
                        if(Session::getInstance()->hasFlashes()){
                          foreach (Session::getInstance()->getFlashes() as $type => $value ){
                              echo '<div class= "alert-'.$type.'">'.$value.'</div>';
                            }
                          }  
?>
</div>

<!-- <script src="Content/js/parallax.js"></script> -->
<script src="Content/js/stickyNav.js"></script>
<script src="Content/js/menuResponsive.js"></script>
</body>
</html>
