<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function view($template,$vars = array())
{
    extract($vars);
    require "views/$template"."_tpl.php";
}
