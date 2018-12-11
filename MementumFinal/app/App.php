<?php

use core\Database\MysqlDatabase;
use core\Config;

class App
{
    
    public $title = 'Mon super blog';
    private $db_instance;
    private static $_instance;
    
    
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }
    
    public function getTable($name){
        
        $class_name = "\\app\\Table\\" . \ucfirst($name) . 'Table';
        
        return new $class_name($this->getDb());
    }
    
    public function getDb(){
        
        $config = Config::getInstance(ROOT . '/config/config.php');
        if ($this->db_instance === null) {
            
            $this->db_instance = new MysqlDatabase(
                $login = $config->get('user'),
                $mdp = $config->get('pass'),
                $dns = $config->get('dsn')
                );
        }
        
        return $this->db_instance;
    }
    
    public static function load(){
        
        session_start();
        require ROOT . '/app/Autoloader.php';
        app\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        core\Autoloader::register();
    }
    
    public static function tokenGen($lenght){
        
        $token = openssl_random_pseudo_bytes($lenght);
        $token = bin2hex($token);
        
        return  $token;
    }
}
