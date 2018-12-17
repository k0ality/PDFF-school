<?php

function mergeSort(&$array, $low, $high)
{
    if ($low < $high)
    {
        $middle = floor(($low + $high) / 2);

        mergeSort($array, $low, $middle);
        mergeSort($array, $middle + 1, $high);

        merge($array, $low, $middle, $high);
    }
}

function merge(&$array, $low, $middle, $high)
{
    for ($i = $low; $i <= $middle; $i++)
    {
        $left[] = $array[$i];
    }

    for ($i = $middle+1; $i <= $high; $i++)
    {
        $right[] = $array[$i];
    }

    $l = 0;
    $r = 0;

    for ($i = $low; $i <= $high; $i++)
    {
        if($right[$r] <= $left[$l])
        {
            $array[$i] = $left[$l];
            $l++;
        }
        else
        {
            $array[$i] = $right[$r];
            $r++;
        }
    }
}

$array = [4, 7, 1, 3, 2, 6];

mergeSort($array, 0, count($array) - 1);

print(implode(', ', $array) . PHP_EOL);
