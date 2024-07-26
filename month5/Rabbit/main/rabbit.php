<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'admin', 'password', '/');
$channel = $connection->channel();
$channel->queue_declare('requests', false, true, false, false);

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$email = $_POST['email'];

$data = [
    'start_date' => $start_date,
    'end_date' => $end_date,
    'email' => $email
];

$msg = new AMQPMessage(json_encode($data), ['delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT]);
$channel->basic_publish($msg, '', 'task_queue');

$channel->close();
$connection->close();

echo "Запрос принят в обработку. Вы получите уведомление на указанный email, когда выписка будет готова.";
