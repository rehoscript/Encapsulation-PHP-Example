<?php
class Request {
    
    protected $url,
              $controller, 
              $defaultController = 'home';

    public function __construct($url) {
        
        $this->url = $url;
        
        //team/about/cvander
        //team/about/hector
        //team
        
        $segments = explode('/', $this->getURL());
        
        $this->resolveController($segments);
        
    }
    
    public function resolveController(&$segments){
        
        $this->controller = array_shift($segments);
        
        if(empty($this->controller)){
            $this->controller = $this->defaultController;
        }
    
        
    }
    
    public function getURL(){
        
        return $this->url;
    }
    
    
    public function getController(){
        
        return $this->controller;
    }
    
    public function getControllerClassName(){
        
        return Inflector::camel($this->getController())."Controller";
    }
    
    public function getControllerFileName(){
        
        
    }
    
    
}
