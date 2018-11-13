<?php


class Database{
    
    public $pdo;
    
    
    
    
    
    public function accesDb($login,$password,$host='localhost',$database_name){
        
        if(!$this->pdo){
            
            $this->pdo =new PDO("mysql:dbname=$database_name;host=$host",$login,$password);  
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            
        }
        
        
        return $this->pdo;
    }
    
    
}

