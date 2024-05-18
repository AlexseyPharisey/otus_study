<?php
class solution
{
    const DEFAULT_VALUE = 0;

    public function leftRightDifference(array $nums): array
    {
        return $this->prepareData($nums);
    }

    public function prepareData(array $nums): array
    {
        $result = [];
        foreach ($nums as $key => $value) {
            $data = $this->deleteValueByKey($nums, $key);
            $sums = $this->getLeftRightSum($data, $key);
            $result[] = abs($sums['left'] - $sums['right']);
        }

        return $result;
    }

    private function deleteValueByKey(array $data, int $key): array
    {
        unset($data[$key]);

        return $data;
    }

    private function getLeftRightSum(array $data, int $key): array
    {
        $rightSum = self::DEFAULT_VALUE;
        $leftSum = self::DEFAULT_VALUE;

        foreach ($data as $keyData => $value) {
            if ($keyData < $key) {
                $leftSum += $value;
            } else {
                $rightSum += $value;
            }
        }

        return [
            'left' => $leftSum,
            'right' => $rightSum,
        ];
    }
}