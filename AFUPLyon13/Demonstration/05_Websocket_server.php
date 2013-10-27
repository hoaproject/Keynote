<?php

require '/usr/local/lib/Hoa/Core/Core.php';

// 1. Set server.
$server = new Hoa\Websocket\Server(
    new Hoa\Socket\Server('tcp://127.0.01:8889')
);

// 2. Add listener.
$server->on('message', function ( Hoa\Core\Event\Bucket $bucket ) {

    $message = $bucket->getData()['message'];

    echo 'Message: ', $message, "\n";

    // 3a. Echo.
    $bucket->getSource()->send($message);

    // 3b. Broadcast.
    //$bucket->getSource()->broadcast($message);

    return;
});

// 4. Run!
$server->run();
