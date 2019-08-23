<?php

spl_autoload_register('autoload');

function autoload($class)
{
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use visitor\Person;
use visitor\VisitorOne;
use visitor\VisitorTwo;

$person = new Person();
$person->eat($visitor = new VisitorOne());
$person->eat($visitor = new VisitorTwo());