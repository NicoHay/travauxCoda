<?php
use \App\Table\Article;
use \App\Table\Categorie;
use  \App\App;


$categorie= Categorie::find($_GET['id']);
$articles = Article::lastByCategory($_GET['id']);
$categories = Categorie::getAll();
if($categorie === false){

   App::notFound();
}

?>
<h1><?=App::getTitle();?></h1>
<?php
foreach ($articles as $posts):  ?>

<h2><a href="<?=$posts->url;?>"><?=$posts->titre;?></a></h2> 

<p><em><?=$posts->categorie;?></em></p>

<p><?= $posts->extrait;?></p>

<?php endforeach; 

foreach ($categorie as $posts):  ?>

<h2><a href="<?=$posts->url;?>"><?=$posts->titre;?></a></h2> 

<p><em><?=$posts->categorie;?></em></p>

<?php endforeach; ?>