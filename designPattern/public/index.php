<?php



require dirname(__DIR__) . 'app/App.php';
App::Load();


$app = App\App::getInstance();

$posts = $app->getTable('Posts');


// var_dump(App\App::getTable('Users'));



// if (isset($_GET['p'])){

// 	$p  = $_GET['p'];


// }
// 	else{
// 	$p = 'home';
// }



// ob_start();

// if($p === 'home')
// {

// 	require '../pages/home.php';

// }
// elseif($p === 'article')
// {

// 	require '../pages/single.php';
// }
// elseif($p === 'categorie')
// {

// 	require '../pages/categorie.php';
// }
// $content = ob_get_clean();

// require '../pages/templates/default.php';