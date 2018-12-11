<?php
namespace app\Controller\Publicc;


class AppController extends  \app\Controller\AppController
{
    
    protected $template = 'default';
    
    
    
    public function __construct(){
        
        parent::__construct();
        
        $this->viewPath = ROOT . '/app/Views/' ;
        
        
    }
    
}

