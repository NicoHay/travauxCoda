<?php

namespace App;

class App{

    private static $title = 'Mon super blog';
    private static $db_instance;
    private static $_instance;




    public static function getInstance(){

        if (is_null(self::$_instance)){

            self::$_instance =   new Table();

        }

        return self::$_instance;
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

    public function getTable($name){

        $class_name = '\\App\\Table\\' . $name . 'Table';
       //die($class_name);
       return new $class_name($this->getDb());
    }

    public function getDb(){

        $config =  Config::getInstance();

        if($this->db_instance === null){

        $this->db_instance = new Database($config->get('db_name'),$config->get('db_user'),$config->get('db_pass'),$config->get('db_host'));

        }
        
        return $this->db_instance;
    }



    




}
