<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function pivotInteger(int $n): int
    {

        $value = 0;
        $result = -1;
        $allSum = $n*($n+1)/2;

        for($i = 1; $i <= $n; $i++) {

            $checkValue = $i*($i+1)/2;
            if ($checkValue == $allSum - $value) {
                $result = $i;
            }
            $value += $i;
        }

        return $result;
    }
}
