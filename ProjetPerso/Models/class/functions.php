<?php



function logged_only(){
   
    if(session_status() == PHP_SESSION_NONE){

    session_start();

    }

        if(!isset($_SESSION['auth'])){

            $_SESSION['flash']['danger']="vous navez pas access a cette page";

            header('location: Login.php');
            
            exit();
        }
        
    }