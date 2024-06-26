<?php

namespace HW_4\code\Services;

class StringValidator
{
    public function isValidString($str): bool
    {
        $count = 0;

        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] == '(') {
                $count++;
            } elseif ($str[$i] == ')') {
                $count--;
            }
            if ($count < 0) {
                return false;
            }
        }
        return $count == 0;
    }
}