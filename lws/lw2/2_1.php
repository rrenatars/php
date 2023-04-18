<?php
$maximum = -INF;
$minimum = INF;
if ($argc < 2)
{
   echo "incorrect parameters" . "\n";
} 
else
{
    for ($i = 1; $i < $argc; $i++)
    {
        $b = $argv[$i];
        $maximum = ($b > $maximum) ? $b : $maximum;
        $minimum = ($minimum > $b) ? $b : $minimum;
    }
    echo "Минимум в массиве " . $minimum . ", максимум в массиве " . "$maximum" . "\n";
}
echo "jfdaafd";
