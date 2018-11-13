<?php



class Forget{

	public $db ;
	public $auth ;
	public $session ;


	public function controlForget(){

		try{
		
			if(!empty($_POST) && !empty($_POST['email'])){
				
				$this->db = App::getDatabase();
				$this->auth = App::getAuth(); 
				$this->session = Session::getInstance();
				
				if($auth->resetPassword($db,$_POST['email'])){
					
					$this->session->setflashes('success','les instructions vous ont été envoyées par e-mail');
					
					App::redirect('index.php?action=login');
					
				}else{
					
					$this->session->setflashes('danger','aucun compte ne correspond a cette adresse');
				}
				
			}

			$vue = new Vue("Forget");
			$vue->genererAdmin();

			
		}catch (Exception $e){
			 $e->getMessage();
			
			$vue = new Vue("Erreur");
			$vue->generer();

		}

	}
	
	
	
	
	
}