<?php

function autoload($classname){
    require dirname(__DIR__)."/Classes/". $classname.'.php';
}
  
spl_autoload_register('autoload');
