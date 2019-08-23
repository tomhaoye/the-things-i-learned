<?php

$times=0;
$arr=[6,3,54,6,23,4,26,7,18,1,4,5,67,48,9];
$n = count($arr);
$lastChangePos=$n-1;
for($j=1;$j<$n;$j++){
        $changeFlag=false;
        for($i=0;$i<$lastChangePos;$i++){
                if($arr[$i]>$arr[$i+1]){
                        $changeFlag=$i;
                        $arr[$i] += $arr[$i+1];
                        $arr[$i+1] = $arr[$i] - $arr[$i+1];
                        $arr[$i] = $arr[$i] - $arr[$i+1];
                }
                $times += 1;
        }
        $lastChangePos=$changeFlag;
        if(!$lastChangePos){
                break;
        }
}
print_r($arr);
echo $times;
