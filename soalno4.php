<?php
function genereateRandomArray($length, $min, $max)
{
    $randomArray = array();
    for ($i = 0; $i < $length; $i++) {
        $randomArray[] = rand($min, $max);
    }
    return $randomArray;
}

function keduaTerbesar($array)
{
    rsort($array);
    return $array[1];
}

$randomArray = genereateRandomArray(5, 1, 100);
echo "Array: " . implode(", ", $randomArray) . "<br/>";
echo "Kedua Terbesar: " . keduaTerbesar($randomArray);
