<?php

require '/usr/local/lib/Hoa/Core/Core.php';

from('Hoathis')
-> import('Instrumentation.Stream.Wrapper', true);

$stream = new Hoa\File\Read(
    'instrument://criteria=+nodes,-moles/resource=04__Test.php'
);
echo $stream->readAll();
