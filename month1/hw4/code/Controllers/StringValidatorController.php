<?php

namespace HW_4\code\Controllers;

use Exception;
use HW_4\code\Services\StringValidator;

class StringValidatorController
{
    public static function validate(string $value): string
    {
        try {
            if (empty($value)) {
                throw new Exception("String parameter is empty");
            }
            $stringValidator = new StringValidator();

            if (!$stringValidator->isValidString($value)) {
                throw new Exception("Your string '$value' contains invalid parentheses");
            }

            http_response_code(200);
            return "OK: Your String '$value' is valid";
        } catch (Exception $e) {
            http_response_code(400);
            return "Bad Request: " . $e->getMessage();
        }
    }
}