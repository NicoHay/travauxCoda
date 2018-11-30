<?php

use Core\Database\MysqlDatabase;
use Core\Config;

class App{

   public  $title = 'Mon super blog';
    private  $db_instance;
    private static $_instance;



    public static function getInstance() {
        if(is_null(self::$_instance)){
            self::$_instance = new App();
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

    public function getTable($name) {
        $class_name = "\\App\\Table\\" . \ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb(){

        $config =  Config::getInstance(ROOT .'/config/config.php');
            if($this->db_instance === null){


        $this->db_instance = new MysqlDatabase($config->get('db_name'),$config->get('db_host'),$config->get('db_user'),$config->get('db_pass'));

        }
        
        return $this->db_instance;
    }

    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }


    




}
