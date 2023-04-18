<?php
$text = " d 1       323 23j          22 j j";
if (strlen($text) > 0) {
    if ($text[0] == ' ')
    {
        $space = true;
    } else {
        $space = false;
        echo $text[0];
    }
} else {
    echo "incorrect parameters\n";
}

for ($i = 1; $i < strlen($text); $i++)
{
    if ($text[$i] == ' ' and !$space)
    {
        echo $text[$i];
        $space = true;
    }
    if ($text[$i] != ' ' && !$space)
    {
        echo $text[$i];
        $space = false;
    } 
    if ($text[$i] != ' ' && $space)
    {
        echo $text[$i];
        $space = false;
    }
}


