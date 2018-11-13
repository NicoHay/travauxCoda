<?php




class Login {
    
    public $auth ;
    public $db ;
    public $session;
    
    
    public function __construct(){
        
        $this->auth = App::getAuth();
        $this->db = App::getDatabase();
        $this->auth->connectFromCookie($this->db);
        
        
    }
    
    public function controlLogin(){
        
        try{    
            
            if($this->auth->user()){
                
                App::redirect('index.php?action=account');              
            }
            
            if(!empty($_POST) && !empty($_POST['username'])&& !empty($_POST['password'])){
                
                
                $user = $this->auth->login($this->db,$_POST['username'],$_POST['password'],$_POST['remenber']);
                $this->session = Session::getInstance();
                
                if($user){
                    
                    $this->session->setFlashes('success','vous etes connecter sur le compte');
                    App::redirect('index.php?action=account');
                    
                }else{
                    
                    $this->session->setFlashes('danger','identifiant ou mot de passe incorrect ! ');  
                    
                }
            }

            $vue = new Vue('Login');   
            $vue->generer();         
            
        }catch (Exception $e){
             $e->getMessage();
            
            $vue = new Vue('Erreur');   
            $vue->genererAdmin();     

        }
        
    }
    
}