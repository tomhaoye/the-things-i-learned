<?php

namespace adapter;


class Adapter implements Target 
{
    private $_adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->_adaptee = $adaptee;
    }

    public function m1()
    {
        $this->_adaptee->m1();
    }

    public function m2()
    {
        echo "adapter m2\n";
    }
}
