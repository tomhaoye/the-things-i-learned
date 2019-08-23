<?php

spl_autoload_register('autoload');

function autoload($class)
{
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use prototype\Prototype;

$pro = new Prototype('aa');
$pro->getName();

$proCloneOne = $pro->getPrototype();
$proCloneOne->_name = 'bb';
$proCloneOne->getName();

