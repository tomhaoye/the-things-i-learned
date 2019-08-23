<?php

spl_autoload_register('autoload');

function autoload($class)
{
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use factory\SimpleFactory;
use factory\BenzFactory;
use factory\BMWFactory;

$car = SimpleFactory::getCar('benz');
empty($car)?print('no this car'):$car->run();

$factory = new BMWFactory;
$factory->getCar()->run();
$factory = new BenzFactory;
$factory->getCar()->run();