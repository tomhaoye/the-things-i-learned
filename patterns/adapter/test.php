<?php

spl_autoload_register('autoload');

function autoload($class)
{
    require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use adapter\Adapter;
use adapter\Adaptee;
use adapter\Adapter2;

$adapter = new Adapter(new Adaptee());
$adapter->m1();
$adapter->m2();

$adapter2 = new Adapter2();
$adapter2->m1();
$adapter2->m2();
