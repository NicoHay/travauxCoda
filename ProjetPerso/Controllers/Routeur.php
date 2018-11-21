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
                case 'login':
                $this->ctrlLogin = new Login();
                $this->ctrlLogin->controlLogin();
                break;
                case 'register':
                $this->ctrlRegister = new Register();
                $this->ctrlRegister->controlRegister();
                break;
                case 'reset':
                $this->ctrlReset = new Reset();
                $this->ctrlReset->controlReset();
                break;
                case 'forget':
                $this->ctrlForget = new Forget();
                $this->ctrlForget->controlForget();
                break;
                case 'logout':
                $this->ctrlLogout = new Logout();
                $this->ctrlLogout->controlLogout();
                break;
                case 'account':
                $this->ctrlAccount = new Account();
                $this->ctrlAccount->controlAccount();
                break;
                case  'confirm':
                $this->ctrlConfirm = new Confirm();
                $this->ctrlConfirm->controlConfirm();
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