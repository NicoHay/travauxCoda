<?php


$post =App::getInstance()->getTable('post')->find($_GET['id']);
$categorie =App::getInstance()->getTable('category')->find($_GET['id']);




if ($post === false) {

    $post->notFound();
}

?>
<h1><?= $post->titre ?></h1>
<p><?= $post->contenu ?></p>
<p><em><?= $categorie->titre ?></em></p>

 



