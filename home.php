<?php
require 'config.php';
require 'helpers.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$confidential = "No public";
$language = "PHP";
$title = "HI!";



view('home',  compact("language","title"));
?>