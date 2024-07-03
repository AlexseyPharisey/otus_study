<?php

declare(strict_types=1);

namespace patterns\strategy;

require __DIR__ . '/../vendor/autoload.php';

class MailSenderServiceExample
{
    /** При добавлении новых реализаций тело метода будет бесконечно расти
     *
     * Нарушение 2 принципов SOLID - Single Responsibility и Open Closed
     *
     * */
    public function send(string $email, string $content, string $driver): bool
    {
        if ($driver === 'mail') {
            //mail($email, 'subject', $content);
            echo 'Письмо отправлено' . PHP_EOL
                . 'EMAIL - ' . $email . PHP_EOL
                . 'CONTENT - ' . $content . PHP_EOL . PHP_EOL;
            return true;
        }

        if ($driver === 'mandrill') {
            // mandrill
            echo 'Письмо отправлено' . PHP_EOL
                . 'EMAIL - ' . $email . PHP_EOL
                . 'CONTENT - ' . $content . PHP_EOL . PHP_EOL;
            return true;
        }

        return true;
    }
}

$mailSenderServiceEx = new MailSenderServiceExample();
$mailSenderServiceEx->send('email', 'content', 'mandrill');