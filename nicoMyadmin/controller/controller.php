<?php

require '../model/Db.php';
require '../model/RecupDb.php';

$affiche= New RecupDb();
$test = New Database();
$test->connection();

switch(true){
    case isset($_POST['createColonne']):
        $test->creationColonne($_POST['table'],$_POST['column'],$_POST['type'],$_POST['longueur'],$_POST['null'],$_POST['increment']);
    break;
    case isset($_POST['deleteColonne']):       
        $test->deleteColonne($_POST['table'],$_POST['column']);
    break;
    case isset($_POST['createEntree']):       
        $test->creationEntree($_POST['table'],$_POST['column'],$_POST['value']);
    break;
    case isset($_POST['deleteEntree']):       
        $test->deleteEntree($_POST['table'],$_POST['column']);
    break;
    case isset($_POST['createTable']):       
        $test->creationTable($_POST['table'],$_POST['key']);
    break;
    case isset($_POST['deleteTable']):     
        $test->deleteTable($_POST['table']);
    break;
    case isset($_POST['tableCrees']):
        $affiche->recupTable($_POST['tableCrees']);
    break;
    case isset($_POST['table']): 
        $tableau = json_decode($_POST['table']);
        $affiche->recupEntree($tableau);
    break;
   
    }

?>