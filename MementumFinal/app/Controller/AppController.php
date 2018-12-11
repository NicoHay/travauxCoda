<?php
namespace app\Controller;

use core\Controller\Controller;
use App;


/**
 *
 * @author nicohay
 *
 */
class AppController extends Controller
{
    
    protected $template = 'default';
    
    
    
    public function __construct(){
        
        
        $this->viewPath = ROOT . '/app/Views/' ;
        
        
    }
    
    
    /**
     ********************************************************************
     *
     * Charge la table 
     * 
     * @param STRING nom de la table a charger
     *
     * @return VOID
     * 
     ********************************************************************
     */
    protected function loadModel($modelName) {
        
        
        $this->$modelName =  App::getInstance()->getTable($modelName);
    }
    
    
   
    
}

