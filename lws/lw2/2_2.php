<?php
if ($argc < 2)
{
   echo "incorrect parameters" . "\n";
} 
else {
    $maximumValue = -INF;
    $minimumValue = INF;
    for ($i = 1; $i < $argc; $i++)
    {
        [$key, $value] = mb_split("=", $argv[$i]);
        $is_min = (strncmp($value, $minimumValue, strlen($value)));
        if ($is_min == -1) {
            $minimumValue = $value;
            $minimumKey = $key;
        }
        $is_max = (strncmp($value, $maximumValue, strlen($value)));
        if ($is_max == 1) {
            $maximumValue = $value;
            $maximumKey = $key;
        }
    }
    echo "Min: $minimumKey, max: $maximumKey\n";
}