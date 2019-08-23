<?php

$arr = range(0,99);
shuffle($arr);
$minThan = 100;

//分布计数排序
$length = count($arr);
$arrSet = new SplFixedArray($minThan);

foreach ($arr as $item) {
    $arrSet[$item] = isset($arrSet[$item]) ? ($arrSet[$item] + 1) : 1;
}

$start = 0;
for ($i = 0; $i < $minThan; $i++) {
    if (!empty($arrSet[$i])) {
        $arrSet[$i] += $start;
        $start = $arrSet[$i];
    }
}

$newArr = new SplFixedArray($length);
foreach ($arr as $value) {
    $element = $arrSet[$value];
    $newArr[--$element] = $value;
    $arrSet[$value] = $element;
}

print_r($newArr);
