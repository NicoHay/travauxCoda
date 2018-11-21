<?php

namespace App;


Class Perso{
    
    
    
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