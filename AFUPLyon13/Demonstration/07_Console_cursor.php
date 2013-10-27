<?php

require '/usr/local/lib/Hoa/Core/Core.php';

Hoa\Console\Cursor::colorize('underlined foreground(yellow) background(#932e2e)');
echo 'foo';
Hoa\Console\Cursor::colorize('!underlined background(normal)');
echo 'bar', "\n";
