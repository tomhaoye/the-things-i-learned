<?php

function validParentheses(array $parentheses) {
    $stack = [];
    foreach ($parentheses as $key => $parenthesis) {
        print_r($parenthesis);
        if ($parenthesis == '(') {
            array_push($stack, $parenthesis);
        } else {
            if(array_pop($stack) === null) {
                return false;
            }
        }
    }
    if (count($stack)) return false;
    return true;
}

var_dump(validParentheses(['(','(','(',')',')',')']));
var_dump(validParentheses(['(','(',')','(',')',')']));
var_dump(validParentheses([')','(',')','(',')',')']));

var_dump(validParentheses(['(',')',')','(','(',')']));
var_dump(validParentheses([')','(','(',')',')','(']));

var_dump(validParentheses(['(','(','(',')',')','(',')',')']));

