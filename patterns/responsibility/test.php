<?php

spl_autoload_register('autoload');

function autoload($class)
{
  require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use responsibility\Headman;
use responsibility\Application;
use responsibility\Director;

$apply = new Application();
$apply->why = '因私事';
$apply->when = '周五';
$apply->what = '请假--小明';

$leader = new Headman('组长');
$leader->apply($apply);

$apply = new Application();
$apply->why = '因能力太强';
$apply->when = '下月起';
$apply->what = '要求提薪--小明';

$leader = new Headman('组长');
$leader->setLeader(new Director('主管'));
$leader->apply($apply);