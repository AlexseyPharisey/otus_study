<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf(array $nums): array
    {
        $data = [];
        $result = [];
        foreach ($nums as $key => $value) {
            $data = $nums;
            unset($data[$key]);
            $result[] = array_product($data);
        }

        return $result;
    }
}