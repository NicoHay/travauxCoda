<?php

$app = App::getInstance();
$post = $app->getTable('Post')->find($_GET['id']);




if ($post === false) {

    $post->notFound();
}

$app->title = $post->titre;

?>
<h1><?= $post->titre ?></h1>

 <p><em><?= $categorie->titre ?></em></p>
 
<p><?= $post->contenu ?></p>



