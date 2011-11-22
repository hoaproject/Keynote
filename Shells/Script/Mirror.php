<?php

require  '/usr/local/lib/hoa/Core/Core.php';

from('Hoa')
-> import('Socket.Server')
-> import('Websocket.Server');

$socket    = new Hoa\Socket\Server('tcp://127.0.0.1:8889');
$websocket = new Hoa\Websocket\Server($socket);

$websocket->on('message', function ( Hoa\Core\Event\Bucket $bucket ) {

    $message = $bucket->getData();
    $self    = $bucket->getSource();
    $server  = $self->getServer();
    $nodes   = $server->getNodes();

    switch(substr($message, 0, strpos($message, ',') ?: strlen($message))) {

        case 'FORWARD':
        case 'BACK':
        case 'START':
        case 'END':
        case 'SET_CURSOR':
          break;

        case 'OPEN':
            echo "\r",
                 '+ A viewer has joined', "\n",
                 ($c = count($nodes) - 1), ' viewer', (1 < $c ? 's' : ''), '.';
          break;

        default:
            return;
    }

    $id = $server->getCurrentNode()->getId();

    foreach($nodes as $node)
        if($id != $node->getId())
            $self->send($message, $node);
});

$websocket->on('close', function ( Hoa\Core\Event\Bucket $bucket ) {

    $nodes = $bucket->getSource()->getServer()->getNodes();

    echo "\r",
         '- A viewer has left.', "\n",
         ($c = count($nodes) - 1), ' viewer', (1 < $c ? 's' : ''), '.';

});

$websocket->run();
