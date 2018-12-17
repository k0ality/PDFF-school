<?php

function bubbleSort($array) {
    $length = count($array);
    for ($i = 0; $i < $length; $i++) {
        for ($j = $length - 1; $j > $i; $j--) {
            if ($array[$j] < $array[$j-1]) {
                exchange($array, $j, $j-1);
            }
        }
    }
    return $array;
}

function exchange(&$array, $a, $b) {
    $tmp = $array[$a];
    $array[$a] = $array[$b];
    $array[$b] = $tmp;
}

$array = (str_split(substr(rand(), 0, 10), 1));

echo 'Before sorting: ';
echo (implode(', ', $array) . PHP_EOL);
echo 'After sorting: ';
echo (implode(', ',bubbleSort($array)) . PHP_EOL);
