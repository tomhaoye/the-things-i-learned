<?php

namespace dataStructure;

class Stack
{
    public $amount = -1;
    public $stack = [];

    function pop()
    {
        if ($this->amount >= 0) {
            $pop = $this->stack[$this->amount];
            unset($this->stack[$this->amount]);
            $this->amount -= 1;
            return $pop;
        } else {
            return false;
        }
    }

    function push($ele)
    {
        $this->amount += 1;
        $this->stack[$this->amount] = $ele;
    }

}
