<?php
require 'config.php';
require 'helpers.php';


controller($_GET['url']);


//if(empty($_GET['url']))
//{
//    require 'controllers/home.php';
//}
//elseif($_GET['url'] == 'contactos')
//{
//        require 'controllers/contactos.php';
//}
//else
//{
//    header("HTTP/1.0 404 Not Found");
//    exit("Pagina no encontrada");
//}