<?php

declare(strict_types=1);

namespace patterns\strategy;

require __DIR__ . '/../vendor/autoload.php';

interface MailSender
{
    public function send(string $email, string $content): bool;
}

class PhpFunctionMailSender implements MailSender
{
    public function send(string $email, string $content): bool
    {
        echo 'Письмо отправлено' . PHP_EOL
            . 'EMAIL - ' . $email . PHP_EOL
            . 'CONTENT - ' . $content . PHP_EOL . PHP_EOL;
        return true;
    }
}

class MandrillMailSender implements MailSender
{
    public function send(string $email, string $content): bool
    {
        echo 'Письмо отправлено' . PHP_EOL
            . 'EMAIL - ' . $email . PHP_EOL
            . 'CONTENT - ' . $content . PHP_EOL . PHP_EOL;
        return true;
    }
}

class MailSenderService
{
    private $driver;
    public $drivers = [];

    public function addDriver(MailSender $driver, string $driverName): void
    {
        $this->drivers[$driverName] = $driver;
    }

    public function setDriver(string $driver): void
    {
        $this->driver = $driver;
    }

    public function send(string $email, string $content): bool
    {
        return $this->drivers[$this->driver]->send($email, $content);
    }
}

$mailSenderService = new MailSenderService();
$mailSenderService->addDriver(new PhpFunctionMailSender(), 'mail');
$mailSenderService->addDriver(new MandrillMailSender(), 'mandrill');

var_dump($mailSenderService->drivers);

$mailSenderService->setDriver('mail');
$mailSenderService->send('test1@mail.ru', 'contentMail');

$mailSenderService->setDriver('mandrill');
$mailSenderService->send('test2@mail.ru', 'contentMandrill');

