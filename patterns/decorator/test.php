<?php

spl_autoload_register('autoload');

function autoload($class)
{
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use decorator\Casio;
use decorator\Series;

$casio = new Casio();
$casio->produce();

$series = new Series(new Casio);
$series->_series = 'G-SHOCK';
$series->produce();

