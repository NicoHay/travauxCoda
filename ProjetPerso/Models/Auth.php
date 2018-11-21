<?php

class Auth{

    private $db;


    public $donnee;


    public function __construct(){

        
        $this->db = Database::getDatabase();
    }
        
    

    /**
    * change le password d'un utilisateur
    *  le token est remis à null et la date du reset pass est mise a null
    *
    * @param string $pseudo
    * @param string $newPassword
    *
    * @return void
    */
    public function resetPassword( $pseudo,$newPassword){

        $passHash = password_hash($newPassword, PASSWORD_BCRYPT); // hashache du mot de passe

        try{

            $req= $this->db->prepare("UPDATE users SET password = :newpass , token_pass = NULL , reset_at = NULL WHERE id = :user");

            $req->bindParam(':user', $pseudo);
            $req->bindParam(':newpass', $passHash);

            $req->execute();


        }
        catch(PDOexception $e){

            echo $e->getMessage();

        }

        $req = null;




    }
    /**
    * check si le token est conforme a
    * le token doit correspondre a l'user ET
    * la demande de reset doit avoir moins de 24h
    *
    * @param string $user
    * @param int $token
    *
    * @return bool
    */
    public function checkResetToken( $user,  $token){

        try{

            $req = $this->db->prepare("SELECT * FROM users
            WHERE id = :user
            AND token_pass IS NOT NULL
            AND token_pass = :token
            AND NOW() < reset_pass_at + INTERVAL 24 hour");

            $req->bindParam(':user', $user);
            $req->bindParam(':token', $token);


            $req->execute();

            $this->donnee = $req->fetchAll();

            return $this->donnee;
        }

        catch(PDOexception $e){
            echo $e->getMessage();

        }
        $req = null;


    }

    /**
    * verification du mail soumis lors de mot de passe oublié
    * ET recuperation de l'ID user du mail associé
    *
    * controle si l'email correspond bien a un user dans la BDD
    * et appelle la methode sendMail
    *
    * @param string $mail
    * @return void
    */
    public function checkMail($mail){

        try{


            $req = $this->db->prepare("SELECT id , email FROM users WHERE email = :email ");

            $req->bindParam(':email', $mail);


            $req->execute();
            $resultat = $req->fetch();



            $this->sendMail($resultat);

        }

        catch(PDOexception $e){
            echo $e->getMessage();

        }
        $req = null;
    }

    /**
    * envoie de mail pour changer de password
    *
    * @param array $value array associatif
    * @return void
    */
    public function sendMail($value){


        $token = Functions::tokenGen(30);            //genere un token de 60 characteres

        //envoie du mail avec token
        mail($value->username,"Réinitialisation de votre mot de passe sur codaleague.org","Bonjour, \n
        Pour changer votre mot de passe, veuillez cliquez sur le lien suivant: \n
        http://192.168.3.125/sitecodaleague/index.php?action=newpass&id=$value->id&token=$token
        Nous vous remercions pour votre confiance. \n
        Lequipe CodaLeague.");


        //enregistre token en bdd et update de la date du reset
        $req= $this->db->prepare("UPDATE users SET token_pass = :token , reset_at = NOW()
        WHERE id = :id");

        $req->bindParam('token', $token);
        $req->bindParam('id', $value->id);

        $req->execute();

    }




    /**
    * control si un utilisateur est authentifier
    * SI oui recupere sont grade en BDD
    * ET ensuite enregistre sont grade dans la session
    *
    * appelle la methode makesession
    *
    * @param string $login
    * @param string $password
    * @return boolean
    */
    public function isAuth($login,$password){


        $req= $this->db->prepare("SELECT _password, id FROM users WHERE username = :login") ;
        $req->bindParam('login',$login);

        $req->execute();
        $passDb =$req->fetch();

       
        if($passDb) {
            $grade = $passDb->grade;
    
            if(password_verify($password,$passDb->password)){
    
                $_SESSION['id']= $passDb->id;
    
                $this->makeSession($login,$grade);
    
    
    
            }
        }else{


            return $message ='
            <div id="preLogError"></div>
            <div id="logError">
                  <p>Mot de passe ou login incorrect</p>
            </div>';

        }


    }


    /**
    * detruit la session
    *
    * @return void
    */
    public function destroySession(){

        session_destroy();
        header("Location: index.php?action=login");

    }

    /**
    * Controle du nouveau mot de passe recu
    *
    * @param string $pass1
    * @param string $pass2
    *
    * @return bool
    */
    public function checkNewPass($pass1,$pass2){
        
        //check si le mot de passe comporte 1 chiffre / 1 majuscule /  plus de 8 characteres
        $verify = preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$#',$pass1); 
        
        if(($pass1 === $pass2) && ($verify == 1)){      //check si les deux mot de passe saisis sont identiques 
            
            return true;

        }else{

            return false;
        }

    }




}
