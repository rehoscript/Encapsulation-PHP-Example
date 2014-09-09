<?php
require 'config.php';
require 'helpers.php';
require 'Library/Request.php';
require 'Library/Inflector.php';

if(empty($_GET['url'])){
    
    $url = "";
}
else{
    
    $url = $_GET['url'];
}

$request = new Request($url);
$request->execute();
        


