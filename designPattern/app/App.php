<?php

namespace App;

class App{

    private static $database;
    private static $title = 'Mon super blog';
    private static $_instance;




    public static function getDb(){


        if(static::$database === null){

           $config =  Config::getInstance();

          

            static::$database = new Database($config->get('db_name'),$config->get('db_user'),$config->get('db_pass'),$config->get('db_host'));
          
        }

        return static::$database;
    }

    public static function notFound(){

        header("Location: index.php?p=404");
    }

    public static function getTitle(){

        return self::$title;
    }

    public static function setTitle($title){

        self::$title  = $title ;
    }

}
