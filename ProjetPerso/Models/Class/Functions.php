<?php

class Functions 
{
    
    /**
	* genere un token aleatoire.
	*
	* @param int $lenght
	*     longeur du token qui sera multiplier par deux
	*
	* @return $token
	*/
	static function tokenGen($lenght){
		
		$token = openssl_random_pseudo_bytes($lenght);
		$token = bin2hex($token);
		
		return  $token;
		
    }
    
    /**
	* fonction de debugg perso
	*
	* @param string $value
	* @return void
	*/
	static function  dbug($value) {
		
		switch (gettype($value)) {
			case 'string' :
			echo $value;
			break;
			default :
			echo '<pre>';
			print_r($value);
			echo '</pre>';
			break;
			
		}
    }

    
}
