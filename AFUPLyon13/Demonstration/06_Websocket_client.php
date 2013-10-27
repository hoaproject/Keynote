<?php

require '/usr/local/lib/Hoa/Core/Core.php';

$readline = new Hoa\Console\Readline();
$client   = new Hoa\Websocket\Client(
    new Hoa\Socket\Client('tcp://127.0.0.1:8889')
);
$client->setHost('localhost');
$client->connect();

do {

    $line = $readline->readLine('> ');

    if(false === $line || 'quit' === $line)
        break;

    $client->send($line);

} while(true);
