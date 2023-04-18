<?php
function compareFloats(float $value1, float $value2): int
{
    if (abs($value1 - $value2) < 0.00001) {
        return 0;
    } elseif ($value2 > $value1) {
        return 1;
    } else {
        return -1;
    }
}

function arrayEquals(array $left, array $rights): bool
{
    if ($left == $rights) {
        return true;
    } else {
        return false;
    }
}   

function arrayNumberFilter(array $data): array
{
    $arrayDigit = [];
    foreach($data as $value)
    {   
        if (is_int($value)) {
            $arrayDigit[] = $value;
        }
    }
    return $arrayDigit;
}
