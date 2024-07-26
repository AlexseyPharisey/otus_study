<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.yandex.ru';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'Lexach99@yandex.ru';
        $mail->Password   = '****';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 993;

        $mail->setFrom('rabbitMQ', 'Your bunny wrote');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo "Message has been sent to $to\n";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}\n";
    }
}

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'admin', 'password', '/');
$channel = $connection->channel();
$channel->queue_declare('task_queue', false, true, false, false);

$callback = function($msg) {
    $data = json_decode($msg->body, true);
    $email_to = $data['email'];
    $subject = 'Ваша банковская выписка';
    $body = "Ваша банковская выписка с {$data['start_date']} по {$data['end_date']}";
    sendEmail($email_to, $subject, $body);
};

$channel->basic_consume(
    'task_queue',
    '',
    false,
    true,
    false,
    false,
    $callback
);

while($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();
