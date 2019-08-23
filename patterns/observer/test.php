<?php

spl_autoload_register('autoload');

function autoload($class)
{
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use observer\Observed;
use observer\ObserverOne;

$observed = new Observed();
$observerone = new ObserverOne();
$observed->attach($observerone);
$observed->notify();

$observed->detach($observerone);
$observed->notify();