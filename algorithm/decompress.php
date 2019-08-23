<?php

$readFile = fopen("file/compressFile", "rb") or die("Unable to open file!");
$wholeStr = '';
while (!feof($readFile)) {
    $char = fgetc($readFile);
    $char = unpack('H*', $char);
    $binStr = base_convert($char[1], 16, 2);
    $binStr = str_pad($binStr, 8, "0", STR_PAD_LEFT);
    $wholeStr .= $binStr;
}
fclose($readFile);
$wholeStr = substr($wholeStr, 0, -8);
$wholeStrLen = strlen($wholeStr);

$sourceText = '';
$map = file_get_contents('file/.config');
$mapArr = json_decode($map, true);

$min = INF;
$max = -INF;
foreach ($mapArr as $key => $map) {
    $min = min(strlen($key), $min);
    $max = max(strlen($key), $max);
}
for ($f = 0, $step = $min; $f < $wholeStrLen;) {
    $bin = '';
    for ($index = $f; $index < $f + $step; $index++) {
        if (isset($wholeStr[$index])) {
            $bin .= $wholeStr[$index];
        }
    }
    if (isset($mapArr[$bin])) {
        $sourceText .= base64_decode($mapArr[$bin]);
        $f = $f + $step;
        $step = $min;
    } else {
        if ($step == $max) {
            $f = $f + $step;
            $step = $min;
        } else {
            $step++;
        }
    }
}
file_put_contents('file/decompressFile', $sourceText);


//function bin2bStr($input)
//{
//    if (!is_string($input)) return null;
//    $input = str_split($input, 4);
//    $str = '';
//    foreach ($input as $v) {
//        $str .= base_convert($v, 2, 16);
//    }
//    $str = pack('H*', $str);
//    return $str;
//}
//
//function bStr2bin($input)
//{
//    if (!is_string($input)) return null;
//    $input = unpack('H*', $input);
//    $input = base_convert($input[1], 16, 2);
//    $input = str_pad($input, 8, "0", STR_PAD_LEFT);
//    return $input;
//}

