<?php

spl_autoload_register('autoload');

function autoload($class)
{
    require __Dir__ . '/../' . str_replace('\\', '/', $class) . '.php';
}

use dataStructure\Huffman;
use dataStructure\LinkedList;


global $mapArr;

$readFile = fopen("file/bigFile", "r") or die("Unable to open file!");
$charCount = 0;
$charArr = [];
while (!feof($readFile)) {
    $char = fgetc($readFile);
    if (ord($char) !== 0) {
        isset($charArr[$char]) ? $charArr[$char]++ : $charArr[$char] = 1;
        $charCount++;
    }
}
fclose($readFile);
arsort($charArr);

foreach ($charArr as $char => $times) {
    $linkedList = new LinkedList(new Huffman($times, null, null, null, $char), isset($linkedList) ? $linkedList : null);
}

$callListFunc = new LinkedList(null, null);
/**
 * @var LinkedList $linkedList
 * @var LinkedList $callListFunc
 */
function buildHuffmanTree(&$linkedList, $callListFunc)
{
    if ($linkedList && $linkedList->getNext()) {
        $parentWeight = $linkedList->getValue()->getWeight() + $linkedList->getNext()->getValue()->getWeight();
        $huffmanTree = new Huffman($parentWeight, null, $linkedList->getValue(), $linkedList->getNext()->getValue(), '');
        $linkedList = $linkedList->getNext()->getNext();
        $callListFunc->insert($linkedList, $huffmanTree);
        buildHuffmanTree($linkedList, $callListFunc);
    }
}

buildHuffmanTree($linkedList, $callListFunc);

$huffmanTree = $linkedList->getValue();

/**
 * @param Huffman $huffman
 * @param null $binary
 * @param string $str
 */
function getCharMap($huffman, $binary = null, $str = '')
{
    global $mapArr;
    if ($huffman) {
        if (!is_null($binary)) {
            $str = $str . $binary;
            $mapArr[$huffman->getLetter()] = $str;
        }
        getCharMap($huffman->getLeftChild(), '0', $str);
        getCharMap($huffman->getRightChild(), '1', $str);
    }
}

getCharMap($huffmanTree);

$config = [];
foreach ($mapArr as $char => $bin) {
    if ($char !== '') {
        $config[$bin] = base64_encode($char);
    }
}
file_put_contents('file/.config', json_encode($config, JSON_UNESCAPED_SLASHES));


$bigFileStr = file_get_contents("file/bigFile");
$strLen = strlen($bigFileStr);

$newFile = '';
for ($i = 0; $i < $strLen; $i++) {
    if (isset($mapArr[$bigFileStr[$i]])) {
        $newFile .= $mapArr[$bigFileStr[$i]];
    }
}
$newFileStrLen = strlen($newFile);
$padNum = $newFileStrLen + 8 - ($newFileStrLen % 8);
$newFile = str_pad($newFile, $padNum, "0", STR_PAD_RIGHT);

file_put_contents('file/compressFile', bin2bStr($newFile));

// Convert a binary expression_r(e.g., "100111") into a binary-string
function bin2bStr($input)
{
    if (!is_string($input)) return null;
    // Pack into a string
    $input = str_split($input, 4);
    $str = '';
    foreach ($input as $v) {
        $str .= base_convert($v, 2, 16);
    }
    $str = pack('H*', $str);
    return $str;
}

