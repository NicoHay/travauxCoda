<?php
namespace app\Controller;

use core\Auth\DBAuth;
use App;

/**
 *
 * @author nicohay
 *        
 */
class UsersController extends AppController
{
    public function __construct(){
        
        parent::__construct();

        
        $this->loadModel('User');
        
        
    }
    
    /**
     ********************************************************************
     *
     * gestion de la partie login 
     * traitement du formulaire de login
     * si la reponse est ok envoie sur la page index de la partie admin
     * sinon retourne une erreur
     *
     * @return VOID
     * 
     ********************************************************************
     */
    public function login($errors = TRUE) {

        
            if(!empty($_POST['login_form'])){
            
            
            $app = App::getInstance();
            $auth = new DBAuth($app->getDb());
            
            if($auth->login( $_POST['username_login'] , $_POST['password_login'] )){
                
              header("Location: index.php?p=admin.posts.index");
                   
            }else {
                
                $errors = TRUE;
            }
            
        }
      
        $this->render( 'users.login' , compact( 'errors' ) );
        
    }
    
    
    /**
     ********************************************************************
     *
     * gestion de la partie inscription
     * traitement du formulaire d'inscription
     * 
     * -> appel a la fonction controlPass
     * -> appel a la fonction hashPass
     * 
     * enregistre lutilisateur en BDD
     *
     * @return VOID
     * 
     ********************************************************************
     */
    public function register() {
        
        $message= FALSE;
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        
        if(!empty($_POST['registerForm'])) {
            
            $validPass = $this->controlPass($_POST['pass_register'], $_POST['confirm_pass_register']);
            
            if ($validPass === TRUE) {
                
                $passHash = $auth->hashPass($_POST['confirm_pass_register']);
                      
                $result = $this->User->create([
                    'nom'           => $_POST['nom_register'],
                    'prenom'        => $_POST['prenom_register'],
                    'email'         => $_POST['email_register'],
                    'pass'          => $passHash
                ]);
                }
                                
                if ($result) {
                    
                    $message = TRUE;
                   
                }     
        }     
        
        $this->render( 'users.register' , compact('message') );      
    }
    
    /**
     ********************************************************************
     *
     * gestion d'oubli du mot de passe 
     * traitement du formulaire 
     * 
     * -> appel a la fonction mailPassForget 
     *
     * @return VOID
     * 
     ********************************************************************
     */
    public function forget() {
        
        if (!empty($_POST['forget_form'])) {
            
            
            $users   = $this->User->find($_POST['email_forget'],'email');

            if($users){
                
                $token = App::tokenGen(40);     
                $date = date("Y-m-d H:i:s");
               
                $this->User->update($users->id,[
                    "reset_token"       => $token ,
                    "reset_at"          => $date ,      
                ]);
                $this->mailPassForget( $users->email , $users->id , $token );
       
                
                $this->render( 'users.login' );
            }
        }
        
        $this->render( 'users.forget' );
    }
    
    /**
     ********************************************************************
     *
     * gestion la fonction reset mot de passe 
     * traitement du formulaire
     *
     * TODO! LOL refactoriser tout ca cest le bordel MAIS ca marche :)
     *
     * @return VOID
     *
     *********************************
     */
    public function reset() {
        
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        
        // control de la validiter du token 
        $validToken = $this->User->findToken($_GET['id'],$_GET['token'],"reset_token");
        
        if($validToken){
        
            if (!empty($_POST['reset_form'])) {
                
                $validPass = $this->controlPass($_POST['pass_reset'], $_POST['confirm_pass_reset']);
                
                if ( $validPass ) {
                    
                    $passHash = $auth->hashPass($_POST['confirm_pass_reset']);
                    
                    $this->User->update( $_GET['id'] , [
                        'pass'          => $passHash ,
                        'reset_token'   => NULL ,
                        'reset_at'      => NULL ,
                    ]); 
                    
                    
                    // les deux mots de passe sont identique donc renvoie sur la page login 
                    $this->login();
                
                }else{
                    
                    $this->render('users.reset');
                    
                }
                
            //  TODO! gerrer le message erreur  mot de passe differents
              }
              
        
            // id et token correspondent donc affichage de la page reset
            $this->render('users.reset');
            
        }else{
            
              //  TODO!  le token et/ou l'id  ne correspondent pas
            $this->forget();
            
        }
         
    }
    
    /**
     ********************************************************************
     *
     * Controlle que les deux mots de passe entrés soit identiques
     * 
     *  @param STRING $pass1
     *  @param STRING $pass2
     *
     * @return BOOLEAN
     * 
     ********************************************************************
     */
    protected function controlPass( $pass1 , $pass2 ) {
        if ($pass1 === $pass2) {
            
            return TRUE;
        }
        
        return FALSE;
        
    }
            
    /**
     ********************************************************************
     *
     * Envoi du mail avec le token et l'id de la personne qui le demande
     *
     *  @param STRING $email de l'user qui fait la demande
     *  @param STRING $id de l'user
     *  @param STRING $token aleatoire
     *
     * @return VOID
     *
     ********************************************************************
     */
    protected function mailPassForget($email,$id,$token){
           
 
        mail($email,"Réinitialisation de votre mot de passe sur Mementum","Bonjour, \n
        Suite a votre demande , Vous pouvez redéfinir votre mot de passe, en cliquant sur le lien suivant et suivre les instructions : \n
        http://localhost/github/travauxCoda/MementumFinal/public/index.php?p=users.reset&id=$id&token=$token
        Nous vous remercions pour votre confiance. \n
        L'équipe Mementum.");
        
    }
    
}