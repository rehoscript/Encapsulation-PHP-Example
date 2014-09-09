<?php
class HomeController{
    
    public function indexAction(){
        
        
    }
}

$confidential = "No public";
$language = "PHP";
$title = "HI!";



view('home',  compact("language","title"));
?>