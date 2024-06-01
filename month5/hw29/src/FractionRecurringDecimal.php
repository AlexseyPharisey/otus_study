<?php

declare(strict_types=1);

class FractionRecurringDecimal
{
    const VALUE_ZERO = 0;

    function fractionToDecimal($numerator, $denominator) {
        if ($numerator == self::VALUE_ZERO) {
            return "0";
        }

        $result = "";

        if (
            ($numerator < self::VALUE_ZERO && $denominator > self::VALUE_ZERO)
            || ($numerator > self::VALUE_ZERO && $denominator < self::VALUE_ZERO)) {
            $result .= "-";
        }

        $numerator = abs($numerator);
        $denominator = abs($denominator);

        $result .= intdiv($numerator, $denominator);
        $remainder = $numerator % $denominator;

        if ($remainder == self::VALUE_ZERO) {
            return $result;
        }

        $result .= ".";
        $map = [];
        while ($remainder != self::VALUE_ZERO) {
            if (isset($map[$remainder])) {
                $result = substr_replace($result, "(", $map[$remainder], self::VALUE_ZERO);
                $result .= ")";
                break;
            }


            $map[$remainder] = strlen($result);
            $remainder *= 10;
            $result .= intdiv($remainder, $denominator);
            $remainder %= $denominator;
        }

        return $result;
    }
}

//$numerator = 1;
//$numerator = 2;
$numerator = 3;
//$denominator = 2;
//$denominator = 1;
$denominator = 444;

$class = new FractionRecurringDecimal();
echo $class->fractionToDecimal($numerator, $denominator);
