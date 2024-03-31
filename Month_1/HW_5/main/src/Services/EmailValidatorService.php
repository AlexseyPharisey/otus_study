<?php

declare(strict_types=1);

namespace HW_5\main\src\Services;

class EmailValidatorService
{
    function validate(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        list($username, $domain) = explode('@', $email);

        if (checkdnsrr($domain) && getmxrr($domain, $mxHosts)) {
            return true;
        } else {
            return false;
        }
    }
}