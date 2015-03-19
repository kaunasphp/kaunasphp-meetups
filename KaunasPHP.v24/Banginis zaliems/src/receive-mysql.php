<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;

$connection = new AMQPConnection('rabbitmq', 5672, 'guest', 'guest');
$channel = $connection->channel();


$channel->queue_declare('mysql', false, false, false, false);

echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

$buffer = array();
$mysqli = new mysqli('mysql', 'root', 'root');

$callback = function($msg) {
    global $buffer, $mysqli;
    echo " [x] Received ", $msg->body, "\n";
    $buffer[] = $msg->body;
    if (count($buffer) > 10) {
        $mysqli->query('INSERT INTO test.table1 VALUES '. implode(',', $buffer));
        $buffer = array();
        echo " [x][x][x][x][x] FLUSH \n";
    }

};

$channel->basic_consume('mysql', '', false, true, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();