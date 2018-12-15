<?php

function printCombinedShape($n)
{
    for ($i = 0; $i < $n; $i++)
    {
        for ($j = $i; $j < $n; $j++)
            echo(" ");

        for ($j = 0;
             $j < 2 * $i + 1; $j++)
            echo("*");

        echo PHP_EOL;
    }

    for ($i = 0; $i < $n - 1; $i++)
    {
        for ($j = 0; $j < $i + 2; $j++)
            echo(" ");

        for ($j = 0;
             $j < 2 * ($n - 1 - $i) - 1; $j++)
            echo("*");

        echo PHP_EOL;
    }
}

$shortOptions = 'h:';
$longOptions = ['height:'];
$heightCliVar = array_values(getopt($shortOptions, $longOptions))[0];
$heightCli = $heightCliVar ?: $argv[1];

printCombinedShape(floor($heightCli/2));
