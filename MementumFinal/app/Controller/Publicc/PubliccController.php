<?php
namespace app\Controller\Publicc;



/**
 *
 * @author nicolas
 *        
 */
class PubliccController extends AppController
{
    
    public function __construct(){
        
        parent::__construct();
        
        $this->loadModel('Messagerie');
    }


    public function index() {
        $errors= true;
        
        if(!empty($_POST['contactMail'])) {
            $result = $this->Messagerie->create([
                'nom_contact'             => $_POST['contact_nom'],
                'prenom_contact'           => $_POST['contact_prenom'],
                'email_contact'           => $_POST['contact_email'],
                'message_contact'           => $_POST['contact_message'],
            ]);
            if($result) {
                $errors = false;
               
            }
        }
       
        
        $this->render('publicc.index' , compact( 'errors' ));
    }
 
    
}


