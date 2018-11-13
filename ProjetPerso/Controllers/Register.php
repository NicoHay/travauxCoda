<?php



class Register{
    
    
    public $db;
    public $errors;
    public $validator;
    
    
    public function controlRegister(){
        
        try{
            
            if (!empty($_POST)){
                
                $this->errors= array();
                
                $this->db = App::getDatabase();
                
                $this->validator= new Validator($_POST);
                
                $this->validator->isAlpha('username',"votre pseudo n'est pas valide(alphanumerique)");
                
                
                if($this->validator->isValid()){
                    
                    $this->validator->isUniq('username',$this->db,'users', 'ce pseudo est deja pris' );
                    
                }
                
                $this->$validator->isEmail('email', "votre email n'est pas valide" );
                
                
                if ($this->validator->isValid()){
                    
                    $this->validator->isUniq('email',$this->db,'users', "cet email est deja pris par un autre compte" );
                    
                    
                }
                
                $this->validator->isConfirmed('password',"Le mot de passe est Invalide" );
                
                
                if($this->validator->isValid()){
                    
                    App::getAuth()->register($this->db,$_POST['username'], $_POST['password'],$_POST['email']);
                    Session::getInstance()->setFlashes('success','un email de confirmation vous a été envoyer pour validation');
                    App::redirect('index.php?action=login');
                    
                    exit();
                    
                }else{
                    
                    $this->errors= $this->validator->getErrors();
                    
                }
                
            } 
            $vue = new Vue('Register');   
            $vue->genererAdmin();     

            
        }catch (Exception $e){

             $e->getMessage();
            $vue = new Vue('Erreur');   
            $vue->genererAdmin();     

        }
        
    }
    
}


