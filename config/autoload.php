<?php

function autoload($classname){
    require dirname(__DIR__)."/classes/". $classname.'.php';
}
  
spl_autoload_register('autoload'); 

?>