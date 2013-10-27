<?php

require '/usr/local/lib/Hoa/Core/Core.php';

Hoa\Console\Window::setSize(80, 50);
var_dump(Hoa\Console\Window::getPosition());

sleep(1);  Hoa\Console\Window::minimize();
sleep(1);  Hoa\Console\Window::restore();
sleep(1);  Hoa\Console\Window::lower();
sleep(1);  Hoa\Console\Window::raise();
