<?php

spl_autoload_register('autoload');

function autoload($class)
{
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use facade\Animal;

$animal = new Animal();

$animal->produceBee();
$animal->produceFox();