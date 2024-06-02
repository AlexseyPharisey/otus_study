<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$variables = [
    '2' => ['a', 'b', 'c'],
    '3' => ['d', 'e', 'f'],
    '4' => ['g', 'h', 'i'],
    '5' => ['j', 'k', 'l'],
    '6' => ['m', 'n', 'o'],
    '7' => ['p', 'q', 'r', 's'],
    '8' => ['t', 'u', 'v'],
    '9' => ['w', 'x', 'y', 'z']
];

$digits = "23";
//$digits = "";
//$digits = "2";

$digits = str_split($digits);
foreach ($digits as $number) {
    $digitsData[(int)($number)] = $variables[(int)($number)];
}

function combine($arrays, $prefix = '')
{
    $result = [];

    if (empty($arrays)) {
        return [$prefix];
    }

    $firstArray = array_shift($arrays);

    foreach ($firstArray as $element) {
        $result = array_merge($result, combine($arrays, $prefix . $element));
    }

    return $result;
}

echo '<pre>';
print_r(combine($digitsData));
echo '</pre>';