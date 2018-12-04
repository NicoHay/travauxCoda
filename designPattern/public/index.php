<?php

define('ROOT', dirname(__DIR__));

require(ROOT . '/app/App.php');
App::load();




if (isset($_GET['p'])) {

	$page = $_GET['p'];

} else {

	$page = 'home';
}

ob_start();

if ($page === 'home') {

	require ROOT . '/pages/posts/home.php';
} else if ($page === 'posts.category') {

	require ROOT . '/pages/posts/category.php';

} else if ($page === 'posts.show') {

	require ROOT . '/pages/posts/show.php';
}
else if ($page === 'login') {

	require ROOT . '/pages/users/login.php';
}

$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';


