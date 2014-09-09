<?php
class Request {
    
    protected $action,
              $url,
              $controller, 
              $defaultController = 'home',
              $defaultAction = 'index';

    public function __construct($url) {
        
        $this->url = $url;
        
        //team/about/cvander
        //team/about/hector
        //team
        
        $segments = explode('/', $this->getURL());
        
        $this->resolveController($segments);
        $this->resolveAction($segments);
        
        
    }
    
    public function resolveController(&$segments){
        
        $this->controller = array_shift($segments);
        
        if(empty($this->controller)){
            $this->controller = $this->defaultController;
        }
    }
    
    public function resolveAction(&$segments){
        $this->action = array_shift($segments);
        
        if(empty($this->action)){
            $this->action = $this->defaultAction;
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
        
        return 'controllers/'.$this->getControllerClassName().'.php';
    }
    public function getAction(){
        
        return $this->action;
    }
    
    public function getActionMethodName(){
       
        return Inflector::lowerCamel($this->getController())."Action";
    }
}
