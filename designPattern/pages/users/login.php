<?php
use Core\Auth\DBAuth;



if(!empty($_POST)){

    
    $app =App::getInstance();
    $auth = new DBAuth($app->getDb());
    if($auth->login($_POST['username'],$_POST['password'])){

        header("Location: admin.php");

    }else {
        echo"identifiant incorrect!!";
    }

}

?>


<form  method="post">

<input type="text" name="username" placeholder="username" >
<input type="password" name="password"  placeholder="password">
<button type="submit">Envoyer</button>






</form>