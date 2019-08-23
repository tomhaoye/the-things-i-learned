<?php

function getNext(string $word2find) {
	$j = 0;
	$k = -1;
	$next = [-1];
	for (; $j < strlen($word2find);) {
		if ($k == -1 || $word2find[$j] == $word2find[$k]) {
			$next[++$j] = ++$k;
		} else {
			$k = $next[$k];
		}
	}
	unset($next[0]);
	return array_values($next);
}

function KMP(string $target, string $word2find) {
	$next = getNext($word2find);
	print_r($next);
	for ($i = 0, $j = 0; $i < strlen($target) && $j < strlen($word2find); $i++) {
		if (!isset($target[$i])) {
			$j = 0;
			break;
		}
		if ($target[$i] == $word2find[$j]) {
			$j++;
		} else {
			if ($next[$j] > 0) {
				$i--;
				$j = 0;
			} else {
				$j = $j > 0 ? $j - 1 : 0;
			}
		}
	}
	if ($j) {
		echo '起始位置：' . ($i - strlen($word2find)) . PHP_EOL;
	} else {
		echo '找不到目标字符串' . PHP_EOL;
	}
}

KMP('asdsajdiohasdsajdiohioahfadiohioahfasasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahasdsajdiohasdsajdiohioahfadiohioahfasasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsabcaabcabajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdasdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadbiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdscajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohiofdahfasadiohidsajdiohiadiohioahfioahffasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfsioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfadiohidsajdioasdsajdiohasdsajdiohioahfadiohioahfasadiohidsajdiohisdsajdiohioahfasadiohidsajdiohiadiohioahfioahfhisdsajdiohioahfasadiohidsajdiohiadiohioahfioahf', 'abcab');
