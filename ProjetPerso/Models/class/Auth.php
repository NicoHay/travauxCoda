<?php


class Auth{

    private $options =[

        'restriction_msg' => "vous navez pas access a cette page"

    ]; 
    private $session;



public function __construct($session,$options =[]){

$this->options = array_merge($this->options, $options);

$this->session = $session;


}

    public function hashPassword($password){

        return $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }

    public function register($db,$username, $password, $email){


        $password = $this->hashPassword($password);
        $token = Str::random(60);


        $db->query("INSERT INTO users SET username = ? ,password = ? ,email = ? , confirmation_token = ? ",[
            $username,
             $password,
             $email,
             $token
             ]);

        $user_id =$db->lastInsertId();

        mail($email,' confirmation du compte',"afin de valider cliquez sur le lien : http://localhost/projet/vue/confirm.php?id= $user_id&token=$token");



    }
    public function confirm($db,$user_id,$token){


            $user= $db->query('SELECT * FROM users Where id= ?', [$user_id])->fetch();

        if($user && $user->confirmation_token == $token){



            $db->query("UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id= ?" ,[$user_id]); 
           
            $this->session->write('auth',$user);
    
 
            return true;



        }else{
            return false;
        }
    }

    public function restrict(){

        if(!$this->session->read('auth')){

            $this->session->setFlashes('danger',$this->options['restriction_msg']);
            App::redirect('index.php?action=login');
            exit();
          }
          
              
                 
              
    }


    public function user(){

        if(!$this->session->read('auth')){

            return false;
        }else{
            return $this->session->read('auth');
        }
    }

    public function connect($user){

        $this->session->write('auth',$user);



    }


    public function connectFromCookie($db){

        if(isset($_COOKIE['remenber']) && !$this->user()){

            $remenber_token=$_COOKIE['remenber'];
            $parts = explode('==',$remenber_token);
            $user_id = $parts[0];
            $user = $db->query('SELECT * FROM users WHERE id = ?', [$user_id])->fetch();
            
            if($user){

                $expected = $user_id.'=='.$user->remenber_token . sha1($user_id.'ratonlaveurs');

                if($expected == $remenber_token){

                    $this->connect($user);
                    setcookie('remenber', $remenber_token,  60 * 60 * 24 * 7);

                }else{

                    setcookie('remenber', null , -1);
                }
            }else{
                setcookie('remenber', null , -1);
            }
       
       
        }

     


    }

    public function login($db,$username,$password , $remenber = false){

        
       

            $user= $db->query("SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL",[ 'username' => $username ])->fetch();
           
          
           if(password_verify($password,$user->password ) ){

            $this->connect($user);

            if($remenber){

                $this->remenber($db, $user->id);
             }

             return $user;
           }else{
           return false;
           }
            
        

    

    }

    public function remenber($db,$user_id){



        $remenber_token = Str::random(250);

        $db->query("UPDATE users SET remenber_token = ? WHERE id = ? " ,[ $remenber_token , $user_id ] );

        setcookie('remenber', $user_id . '==' . $remenber_token . sha1($user_id . 'ratonlaveurs'), time()+ 60 * 60 * 24 * 7 );

    }

    public function logout(){

        setcookie('remenber' , NULL , -1);

        $this->session->delete('auth');

    }

    public function resetPassword($db,$email){

        $user = $db->query("SELECT * FROM users WHERE email = ? AND confirmed_at IS NOT NULL",[ $email])->fetch();


        if($user){
        
            $reset_token = Str::random(60);

            $db->query("UPDATE users SET reset_pass = ? , reset_at = NOW() WHERE id = ?", [$reset_token , $user->id]);  

            mail($email," reinitialisation du mot de pass","afin de valider cliquez sur le lien : http://localhost/projet/vue/confirm.php?id=$user->id&token=$reset_token");

            return $user;

        }else{
            return false;
                }
            
            }

    public function checkResetToken($db,$user_id,$token){

        $user = $db->query('SELECT * FROM users WHERE id= ? AND reset_pass IS NOT NULL AND reset_pass = ? ',[$user_id , $token])->fetch();

        return $user;
    }



}