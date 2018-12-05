<?php
use Core\Auth\DBAuth;


define('ROOT', dirname(__DIR__));
require(ROOT . '/app/App.php');


App::load();


if (isset($_GET['p'])) {

	$page = $_GET['p'];

} else {

	$page = 'home';
}



$app = App::getInstance();
$auth = new DBAuth($app->getDb());

if(!$auth->logged()){

	$app->forbidden();
}




ob_start();

if ($page === 'home') {

	require ROOT . '/pages/admin/posts/index.php';
	
} else if ($page === 'posts.edit') {

	require ROOT . '/pages/admin/posts/edit.php';

} else if ($page === 'posts.show') {

	require ROOT . '/pages/admin/posts/show.php';
}
else if ($page === 'posts.add') {
	
	require ROOT . '/pages/admin/posts/add.php';
}

else if ($page === 'posts.delete') {
	
	require ROOT . '/pages/admin/posts/delete.php';
}

$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';


