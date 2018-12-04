<?php

use Core\Database\MysqlDatabase;
use Core\Config;

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
        
        $class_name = "\\App\\Table\\" . \ucfirst($name) . 'Table';
        
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
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function forbidden(){

        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }
    public function notFound(){

        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}
