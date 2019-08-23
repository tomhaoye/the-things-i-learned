<?php

function sum($a, $b) {
    if($b == 0) {
        return $a;
    }
    $x = $a^$b;
    $y = ($a&$b)<<1;
    return sum($x, $y);
}

echo sum(21,12);
echo PHP_EOL;


function minus($a, $b, $c=false) {
    if($c) {
        $b = minus(~$b, 1);
    }
    if($b == 0) {
        return $a;
    }
    $x = $a^$b;
    $y = ($a&$b)<<1;
    return minus($x, $y);
}

echo minus(22,8,true);
echo PHP_EOL;

function mul($a, $b) {
    $a = decbin($a);
    $c = 0;
    for($i=0;$i<strlen($a);$i=sum($i,1)) {
        if($a[$i] == '1') {
            $c = sum($c, $b<<$i);
        }
    }
    return $c;
}

echo mul(3,7);
echo PHP_EOL;

function div($a, $b, $c=0) {
    if($a == 0) {
        return $c;
    }
    $mov = 0;
    $tmp = $b;
    while($tmp = $b<<$mov <= $a) {
        $mov = sum($mov,1);
    }
    $mov = minus($mov,1,true);
    if($mov < 0) {
        return [$c, $a];
    }
    $a = minus($a,($b<<$mov),true);
    $c = sum($c,1<<$mov);
    return div($a,$b,$c);
}

print_r(div(183,3));


