<?php 

class RecupDb extends Database {

    public function __construct(){
        parent::__construct();

        $this->connection();

    }

    public function recupTable($table){


        try{    
            $req= $this->conn->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table'");

            $test=$req->fetchAll();
          
 
            echo json_encode($test);

           
            }
            catch(PDOexception $e){
                echo json_encode("veuillez contacter le support(indisponible pour le moment)");
        
            }
                    $req = null;
    }
    public function recupEntree($tableau){

$table = $tableau[0];
$colonne = $tableau[1];


        try{    
            $req= $this->conn->query("SELECT $colonne FROM $table");

            $test=$req->fetchAll();
          
 
            echo json_encode($test);

           
            }
            catch(PDOexception $e){
                echo json_encode("veuillez contacter le support(indisponible pour le moment)");
        
            }
                    $req = null;
    }


    
}

