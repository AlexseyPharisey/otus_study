<?php

require 'vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $data = json_encode([
        'email' => $email,
        'start_date' => $start_date,
        'end_date' => $end_date
    ]);

    $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
    $channel = $connection->channel();

    $channel->queue_declare('task_queue', false, true, false, false);

    $msg = new AMQPMessage($data, ['delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT]);

    $channel->basic_publish($msg, '', 'task_queue');

    echo 'Request received. You will be notified via email once the report is generated.';

    $channel->close();
    $connection->close();
}
?>

