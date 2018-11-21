<?php


class Database{


    static $db = null;
    private $pdo;



    public function __construct($database_name,$host='localhost',$login,$password){

        $this->pdo =new PDO("mysql:dbname=$database_name;host=$host",$login,$password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);


    }

    static function  getDatabase(){

        if(!self::$db){

            self::$db = new Database('root','rootroot','localhost','projet');
        }

        return self::$db;
    }

}