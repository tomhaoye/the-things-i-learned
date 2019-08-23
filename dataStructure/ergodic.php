<?php

spl_autoload_register('autoload');

function autoload($class)
{
    require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use dataStructure\Stack;
use dataStructure\BinaryTree;


$node0 = new BinaryTree(0);
$node1 = new BinaryTree(1);
$node2 = new BinaryTree(2);
$node3 = new BinaryTree(3);
$node4 = new BinaryTree(4);
$node5 = new BinaryTree(5);
$node6 = new BinaryTree(6);
$node7 = new BinaryTree(7);
$node8 = new BinaryTree(8);


$node1->setLeft($node2);
$node1->setRight($node3);
$node4->setLeft($node5);
$node5->setRight($node6);
$node6->setLeft($node7);
$node7->setRight($node8);

$node0->setLeft($node1);
$node0->setRight($node4);

//前序遍历递归
function p($tree)
{
    if ($tree) {
        echo $tree->val;
        p($tree->left);
        p($tree->right);
    }
}

//前序遍历非递归
function pre($tree)
{
    $stack = new Stack();
    while ($tree) {
        while ($tree) {
            if ($tree->right) {
                $stack->push($tree);
            }
            echo $tree->val;
            $tree = $tree->left;
        }
        $tree = $stack->pop();
        if ($tree === false) break;
        $tree = $tree->right;
    }
}

//中序遍历递归
function m($tree)
{
    if ($tree) {
        m($tree->left);
        echo $tree->val;
        m($tree->right);
    }
}

//中序遍历非递归
function mid($tree)
{
    $stack = new Stack();
    while ($tree || $stack->amount >= 0) {
        while ($tree) {
            $stack->push($tree);
            $tree = $tree->left;
        }
        $tree = $stack->pop();
        echo $tree->val;
        $tree = $tree->right;
    }
}

//后序遍历递归
function b($tree)
{
    if ($tree) {
        b($tree->left);
        b($tree->right);
        echo $tree->val;
    }
}

//后序遍历非递归
function back($tree)
{
    $arr = [];
    $stack = new Stack();
    while ($tree) {
        while ($tree) {
            if ($tree->left) {
                $stack->push($tree);
            }
            $arr[] = $tree->val;
            $tree = $tree->right;
        }
        $tree = $stack->pop();
        if ($tree === false) break;
        $tree = $tree->left;
    }
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        echo $arr[$i];
    }
}

pre($node0);
print_r(PHP_EOL);
mid($node0);
print_r(PHP_EOL);
back($node0);


