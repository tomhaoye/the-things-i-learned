<?php

namespace dataStructure;

class BinaryTree
{
    public $left;
    public $right;
    public $val;

    function setLeft($tree)
    {
        $this->left = $tree;
    }

    function setRight($tree)
    {
        $this->right = $tree;
    }

    function __construct($value)
    {
        $this->val = $value;
    }
}
