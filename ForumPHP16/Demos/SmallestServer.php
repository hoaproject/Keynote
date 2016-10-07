<?php

require 'vendor/autoload.php';

use Hoa\Event;
use Hoa\Socket;
use Hoa\Websocket;

$server = new Websocket\Server(
    new Socket\Server('ws://127.0.0.1:8080')
);
$server->on(
    'message',
    function (Event\Bucket $bucket) {
        echo '> ', $bucket->getData()['message'], "\n";
    }
);
$server->run();
