<?php

function readDict(string $filename): array
{
    $dictionary = array();

    $dictFile = fopen("dict/" . $filename, 'r');
    while (!feof($dictFile)) {
        $line = fgets($dictFile);
        $parsedLine = explode(":", $line);
        $key = $parsedLine[0];
        $value = $parsedLine[1];
        $dictionary[$key] = $value;
    } 
    fclose($dictFile);
    
    return $dictionary;
}

function writeDict(string $filename, array $dictionary)
{
    $fh = fopen($filename, "w");
    foreach ($dictionary as $key => $value) {
        fwrite($fh, $key . ": " . $value . "\n");
    }
    fclose($fh);
}