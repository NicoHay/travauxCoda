<?php

require 'Models/class/autoloader.php';

class confirm{

    public $db;

    public function controlConfirm(){
        
        $this->db=App::getDatabase();
        
        
        
        if (App::getAuth()->confirm($this->db,$_GET['id'],$_GET['token'],Session::getInstance())){
            
            Session::getInstance()->setFlashes('succes','compte validé');
            App::redirect('index.php?action=account');
            
        }else{
            
            Session::getInstance()->setFlashes('danger','Ce token n\'est plus valide');
            App::redirect('index.php?action=login');
            
        }

    }
   
}