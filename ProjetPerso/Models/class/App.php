<?php
class App{

    static $db = null;

    static function  getDatabase(){

        if(!self::$db){

            self::$db = new Database('root','sqlcoda#2018!','192.168.3.125','nicoProjet');
        }

        return self::$db;
    }



    static function redirect($page){

        header("Location: $page");
        
        exit();

    }


    static function getAuth(){

        return new Auth(Session::getInstance(),['restriction_msg'=>"Vous n'avez pas accées a cette page"]);

    }
}