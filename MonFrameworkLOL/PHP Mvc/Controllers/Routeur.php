<?php

class Routeur {


    private $ctrlAccount;
    private $ctrlConfirm;
    private $ctrlForget;
    private $ctrlLogin;
    private $ctrlLogout;
    private $ctrlRegister;
    private $ctrlReset;

    public function __construct(){

    }

    public function routerRequete(){

        if (isset($_GET['action'])){

            switch(true){
                case  $_GET['action'] === 'login':
                $this->ctrlLogin = new Login();
                $this->ctrlLogin->controlLogin();
                break;

                default:
                $vue = new Vue('Home');
                $vue->generer();

                }

            }
            else{
                $vue = new Vue('Home');
                $vue->generer();

            }

        }

    }
