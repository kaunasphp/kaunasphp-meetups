<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPConnection('rabbitmq', 5672, 'guest', 'guest');
$channel = $connection->channel();


$channel->queue_declare('mysql', false, false, false, false);

for ($i=0; $i<100; $i++) {
    $msg = new AMQPMessage('("some", "data")');
    $channel->basic_publish($msg, '', 'mysql');
}

echo " [x] Sent {$i} messages\n";

$channel->close();
$connection->close();
