<?php

class solution
{
    public function leftRightDifference(array $nums): array
    {
        $sum = [];
        $revertSum = [];
        $result = [];

        $value = 0;
        for($i = 0; $i < count($nums); $i++) {
            $value += $nums[$i];
            $sum[] = $value;
        }

        $value = 0;
        for($i = count($nums) - 1; $i >= 0; $i--) {
            $value += $nums[$i];
            $revertSum[] = $value;
        }

        $j = count($nums) - 1;
        for($i = 0; $i < count($nums); $i++) {
            $result[] = abs($sum[$i] - $revertSum[$j]);
            $j--;
        }

        return $result;
    }
}

