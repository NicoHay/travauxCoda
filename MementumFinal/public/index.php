<?php
define('ROOT', dirname(__DIR__));

require (ROOT . '/app/App.php');
App::load();


if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'publicc.index';
}

$page = explode('.', $page);

// if($page[0] === 'admin') {
//     $controller = '\app\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
//     $action = $page[2];
// }else{
//     $controller = '\app\Controller\Publicc\\' . ucfirst($page[0]) . 'Controller';
//     $action = $page[1];
// }

switch ($page) {
    
    case $page[0] == 'admin':
       
        $controller = '\app\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
        $action = $page[2];
        break;
        
    case $page[0] =='publicc':
   
        $controller = '\app\Controller\Publicc\\' . ucfirst($page[0]) . 'Controller';
        $action = $page[1];
        break;
        
    case $page[0] =='users':
    
        $controller = '\app\Controller\\' . ucfirst($page[0]) . 'Controller';
        $action = $page[1];
        break;
}

$controller = new $controller();
$controller->{$action}();
