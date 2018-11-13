<?php

class Database
{

    public $servername = '';
    public $username = "";
    public $password = "";
    public $dbname = "";

   public $conn;




    public function __construct(){

        $this->servername = '192.168.3.125' ;
        $this->username = "root";
        $this->password = "sqlcoda#2018!";
        $this->dbname = "template_css_nico";
    }

    public function connection(){
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        }catch(PDOexception $e){
            // echo 'connection echoué';
        }
        return $this->conn;

    }

    public function creationColonne($nomTable,$column,$type,$longueur,$null,$increment){
    try{
    $req= $this->conn->prepare("ALTER TABLE $nomTable ADD
                $column $type($longueur) $null $increment
                ");

                $req->execute();
                echo "colonne creer succes";
    }
    catch(PDOexception $e){
        echo " la colonne existe deja ou les champs n'ont pas été renseignés correctement";

    }
            $req = null;
    }

    public function creationTable($nomTable,$key){

        try{
        $req= $this->conn->prepare("CREATE TABLE $nomTable ($key INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY )");
                    $req->execute();
                    echo "Table crée avec succes";
        }
        catch(PDOexception $e){
            echo "la table existe deja ";

        }
                $req = null;
        }
    public function creationEntree($nomTable,$column,$value){


        try{
        $req= $this->conn->prepare("INSERT INTO $nomTable ($column) VALUES ('$value')");
                    $req->execute();
                    echo "Entrée ajouté avec succes";
        }
        catch(PDOexception $e){
            echo "une erreur est survenue veuillez contactez le support technique ";

        }
                $req = null;
        }


    public function deleteTable($nomTable){
        try{
        $req= $this->conn->prepare("DROP TABLE $nomTable");
                    $req->execute();
                    echo "Table supprimée avec succes";
        }
        catch(PDOexception $e){
            echo "la table n'a pas pu etre supprimer ou est inexistante ";

        }
                $req = null;
        }
    public function deleteColonne($nomTable,$column){
        try{
        $req= $this->conn->prepare("ALTER TABLE $nomTable DROP COLUMN $column");

                    $req->execute();
                    echo "Votre colonne a étais supprimé";
        }
        catch(PDOexception $e){
            echo "echec lors de la suppression de la colonne";

        }
                $req = null;
        }
    public function deleteEntree($nomTable,$column,$entree){
        try{
        $req= $this->conn->prepare("INSERT INTO $nomTable ($column) VALUE ('$entree')");
                    $req->execute();
                    echo "Entrée ajouté avec succes";
        }
        catch(PDOexception $e){
            echo "une erreur est survenue veuillez contactez le support technique ";

        }
                $req = null;
        }


    }

?>
