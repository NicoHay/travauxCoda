<?php
namespace core\Auth;

/**
 *
 * @author nicohay
 *        
 */

use core\Database\Database;


class DBAuth{
    
    
    private $db;
    
    public function __construct(Database $db){
        
        $this->db= $db;
        
    }
    /**
     ********************************************************************
     * permet de se connecter
     *
     * @param string $username
     * @param string $password
     *
     * @return BOOLEAN
     ********************************************************************
     */
    public function login($username , $password){
        
        $user = $this->db->prepare("SELECT * FROM user
                                    WHERE nom = ?",
            [$username], null , true);
        if($user){
            
            if( password_verify($password , $user->pass) ){
                
                $_SESSION['auth']= $user->id;
                
                return true;
            }
        }
        
        return false;
        
    }
    
    /**
     ********************************************************************
     * verifie si l'utilisateur est deja connecter
     * c.a.d s'il a le flag auth dans sa session
     *
     * @return BOOLEAN
     ********************************************************************
     */
    public function logged(){
        
        return isset($_SESSION['auth']);
        
    }
    /**
     * ********************************************************************
     * si l'utilisateur a une session
     * retourne l'id de la session de l'utilisteur
     * SINON retourne FALSE
     *
     * @return VOID
     * ********************************************************************
     */
    public function getUserId(){
        
        if($this->logged()){
            
            
            return $_SESSION['auth'];
            
        }
        return false;
        
    }
 
    /**
     ********************************************************************
     * hash le mot de passe 
     *
     * @param string $pass
     *
     * @return STRING
     ********************************************************************
     */
    public function hashPass($pass) {
        
        return password_hash($pass, PASSWORD_DEFAULT);
        
    }
}
