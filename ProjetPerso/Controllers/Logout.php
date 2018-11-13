<?php

class Logout{

    public function controlLogout(){


        App::getAuth()->logout();
        Session::getInstance()->setFlashes('danger',"vous etes maintenant deconnecter");
        App::redirect("index.php?action=");

    }

}