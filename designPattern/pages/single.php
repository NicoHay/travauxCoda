<?php

use App\App;
use App\Table\Article;
use App\Table\Categorie;


$post = Article::find($_GET['id']);

if($post === false){

    App::notFound();
 }

 App::setTitle($post->titre);

 $categorie = Categorie::find($post->category_id);
 //var_dump($categorie);
 ?>
<h1><?= $post->titre ?></h1>

 <p><em><?= $categorie->titre ?></em></p>
 
<p><?= $post->contenu ?></p>



<a href="index.php?p=home"> home</a>