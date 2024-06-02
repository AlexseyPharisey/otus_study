<?php

require __DIR__ . '/vendor/autoload.php';

use HW_5\main\src\Controllers\EmailValidateController;

$emails = [
    'otus@gmail.com',
    'otus@mail-ru',
    '@gmail.com',
    'otus@comcom.com',
];

print_r(EmailValidateController::emailValidate($emails));