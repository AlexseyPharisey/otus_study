<?php

declare(strict_types=1);

namespace HW_5\main\src\Controllers;

use HW_5\main\src\Services\EmailValidatorService;

class EmailValidateController
{
    public static function emailValidate($emails): array
    {
        $result = [];
        $emailValidator = new EmailValidatorService();
        foreach ($emails as $email) {
            $result[$email] = ($emailValidator->validate($email)) ? 'Валидный email' : 'Невалидный email';
        }

        return $result;
    }
}