<?php

namespace adapter;


class Adapter2 extends Adaptee implements Target
{
    public function m2()
    {
        echo "adapter2 m2\n";
    }
}
