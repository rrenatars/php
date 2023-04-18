<?php

require "3_2_module.php";
$dir = 'dict/';
$dictionary = array();

$dicts = array_diff(scandir($dir), array('..', '.'));
foreach ($dicts as $dict) {
    $readedDict = readDict("$dict");
    $dictionary = array_merge($dictionary, $readedDict);
}

ksort($dictionary);

writeDict("dict.txt", $dictionary);

