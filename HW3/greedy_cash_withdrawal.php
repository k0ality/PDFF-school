<?php

function greedyCashWithdrawal($amount)
{
    $banknotes = [500, 200, 100, 50, 20, 10, 5, 2, 1];
    $cashCount = function($bundle, $faceValue) use (&$amount)
    {
        $quantity = intdiv($amount, $faceValue);
        if ($quantity) {
            $bundle[$faceValue] = $quantity;
            $amount -= $quantity * $faceValue;
        }
        return $bundle;
    };
    return array_reduce($banknotes, $cashCount, []);
}

$options = 'a:';
$longopts = ['amount:'];
$userinput = array_values(getopt($options, $longopts));
$amount = $userinput[0];
$withdrawal = greedyCashWithdrawal($amount);

var_export($withdrawal);

// Develop CLI tool to find minimum number of currency notes and values that sum to given amount. Do not use any loops. Maximum value, that user could provide - 100 000 UAH.
// Input: 600
// Output:
// 500: 1
// 100: 1


// Input: 1234
// Output:
// 500: 2
// 200: 1
// 20: 1
// 10: 1
// 2: 2