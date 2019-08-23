<?php

spl_autoload_register('autoload');

function autoload($class)
{
    require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use dataStructure\LinkedList;

function exist(LinkedList $l) {
    $slow = $l;
    $fast = $l;
    if(!$fast) return null;
    $fast = $fast->getNext();
    while($fast != null && $fast->getNext() != null)
    {
        if($slow === $fast) break;
        $slow = $slow->getNext();
        $fast = $fast->getNext()->getNext();
    }
    if($fast == null || $fast->getNext() == null) return false;
    return true;
}

function findPos(LinkedList $l) {
    $slow = $l;
    $fast = $l;
    if(!$fast) return null;
    while($fast != null && $fast->getNext() != null)
    {
        $fast = $fast->getNext()->getNext();
        $slow = $slow->getNext();
        if ($fast === $slow) {
            $fast = $l;
            while ($fast !== $slow) {
                $fast = $fast->getNext();
                $slow = $slow->getNext();
            }
            return $slow;
        }
    }
    return false;
}


$l0=new LinkedList(0, null);
$l1=new LinkedList(1, $l0);
$l2=new LinkedList(2, $l1);
$l0->setNext($l2);
$l3=new LinkedList(3, $l2);

var_dump(exist($l3));
var_dump(findPos($l3));
