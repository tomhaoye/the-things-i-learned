<?php

spl_autoload_register('autoload');

function autoload($class)
{
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use singleton\Singleton;

$instance1 = Singleton::getInstance();
$instance2 = Singleton::getInstance();

var_dump($instance1===$instance2);

