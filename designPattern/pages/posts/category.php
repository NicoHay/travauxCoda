<?php

$app = App::getInstance();

$categorie =$app->getTable('category')->find($_GET['id']);


if ($categorie === false) {
    
    App::notFound();
}

$articles = $app->getTable('post')->lastByCategory($_GET['id']);
$categories = $app->getTable('category')->all();


?>
<h1><?= $categorie->titre; ?></h1>
<?php

foreach ($articles as $posts) : ?>

<h2><a href="<?= $posts->url; ?>"><?= $posts->titre; ?></a></h2> 



<p><?= $posts->extrait; ?></p>

<?php endforeach;

foreach ($categories as $categorie) : ?>

<h2><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></h2> 


<?php endforeach; ?>