<?php

spl_autoload_register('autoload');

function autoload($class){
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use bridge\Male;
use bridge\ByCar;

$male = new Male('male',new ByCar());
$male->to('拉萨');