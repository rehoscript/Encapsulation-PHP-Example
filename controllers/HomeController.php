<?php
class HomeController{
    
    public function indexAction(){
        
        return new View('home',['language'=>'PHP']);
        
    }
}

?>