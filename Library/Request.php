<?php
class Request {
    
    protected $action,
              $url,
              $controller, 
              $defaultController = 'home',
              $defaultAction = 'index',
              $params = array();

    public function __construct($url) {
        
        $this->url = $url;
        
        //team/about/cvander
        //team/about/hector
        //team
        
        $segments = explode('/', $this->getURL());
        
        $this->resolveController($segments);
        $this->resolveAction($segments);
        $this->resolveParams($segments);
        
        
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
     public function resolveParams(&$segments){
        $this->params = $segments;
        
        
    }
    
    public function getParams(){
        return $this->params;
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
       
        return Inflector::lowerCamel($this->getAction())."Action";
    }
    
    public function execute(){
        $controllerClassName = $this->getControllerClassName();
        $controllerFileName = $this->getControllerFileName();
        $actionMethodName = $this->getActionMethodName();
        $params = $this->getParams();
        
        if(!file_exists($controllerFileName)){
            exit("Controlador no existe");
        }
        
        require $controllerFileName;
        $controller = new $controllerClassName();
        
       $response = call_user_func_array([$controller,$actionMethodName],$params);
        
       $this->executeResponse($response);
        
    }
    
    public function executeResponse($response){
         if($response instanceof Response){
            $response->execute();
        }
        else if(is_string($response)){
            echo $response;
        }
        elseif(is_array($response)){
            echo json_encode($response);
        }
        else{
            exit("Respuesta no valida");
        }
    }
}
