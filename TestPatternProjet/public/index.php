<?php

define('ROOT', dirname(__DIR__));
require(ROOT . 'app/App.php');


App::load();


if (isset($_GET['p'])) {

	$page = $_GET['p'];

} else {

	$page = 'home';
}

ob_start();

if ($page === 'home') {

	require ROOT . '/pages/publique/home.php';

} else if ($page === 'account') {

	require ROOT . '/pages/admin/account.php';

} else if ($page === 'login') {

	require ROOT . '/pages/publique/login.php';
}
else if ($page === 'register') {

	require ROOT . '/pages/publique/register.php';
}
else if ($page === 'forget') {

	require ROOT . '/pages/publique/forget.php';
}

$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';


