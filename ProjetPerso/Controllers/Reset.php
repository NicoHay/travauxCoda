<?php


class Reset{

    public $auth;
    public $db;
    public $user;
    
    
    public function controlReset(){
        
        
        try{
            
            if (isset($_GET['id']) && isset($_GET['token'])){
                
                $this->auth = App::getAuth();
                $this->db = App::getDatabase();
                $this->user =$this->auth->checkResetToken($this->db,$_GET['id'],$_GET['token']);
                
                if($this->user){
                    
                    if(!empty($_POST)){
                        
                        $validator = new Validator($_POST);
                        $validator->isConfirmed('password');
                        
                        if($validator->isValid()){
                            
                            $password = $this->auth->hashPassword($_POST['password']);
                            $this->db->query("UPDATE users SET password = ?, reset_at = NULL , reset_pass = NULL WHERE id= ? ",[$password,$_GET['id'] ]); 
                            $this->auth->connect($this->user);
                            
                            Session::getInstance()->setFlashes('success', "Votre mot de passe a bien été modifié");
                            App::redirect('index.php?action=account');
                        } 
                    }
                    
                }else{
                    
                    Session::getInstance()->setFlashes('danger', "ce token n'est pas valide");
                    App::redirect('index.php?action=login');
                }
                
            }else{
                
                App::redirect('index.php?action=login');
                
            }   
        }
        
        catch (Exception $e){

            $msgErreur = $e->getMessage();
            
            $vue = new Vue('Erreur');   
            $vue->genererAdmin();     
        }

    } 
}




