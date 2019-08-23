<?php

function getCellName($num, $litterNum = 26, &$arr = [])
{
    if (!$num) {
        return false;
    }
    $divide = (int)($num / $litterNum);
    $left = $num % $litterNum;
    if (!$left) {
        $left = $litterNum;
        $divide -= 1;
    }
    $arr[] = $left;
    if ($divide > 26) {
        getCellName($divide, $litterNum, $arr);
    } else {
        if ($divide) {
            $arr[] = $divide;
        }
    }
    return $arr;
}

function number2Cell($num)
{
    $array = array_reverse(getCellName($num));
    foreach ($array as &$value) {
        $value = chr(64 + $value);
    }
    $cell = implode($array);
    return $cell;
}

//根据数字获取excel的列名
print_r(number2Cell(703));
