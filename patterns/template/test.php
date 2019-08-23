<?php

spl_autoload_register('autoload');

function autoload($class)
{
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use template\Milk;

$milk = new Milk('little');
$milk->fill();