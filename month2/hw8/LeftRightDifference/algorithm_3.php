<?php

class solution
{
    public function leftRightDifference(array $nums): array
    {
        $result = [];
        foreach ($nums as $key => $value) {
            $leftSum = array_sum(array_slice($nums, 0, $key));
            $rightSum = array_sum(array_slice($nums, $key + 1));
            $result[] = abs($rightSum - $leftSum);
        }

        return $result;
    }
}