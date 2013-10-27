<?php

require '/usr/local/lib/Hoa/Core/Core.php';

echo 'Hoa\Console\Cursor::save();' . "\n" .
     'Hoa\Console\Cursor::hide();' . "\n" .
     'Hoa\Console\Cursor::move(\'LEFT ↑ ↑ ↑\');' . "\n" .
     'Hoa\Console\Cursor::clear(\'↔\');' . "\n" .
     'echo \'New line!\';' . "\n" .
     'Hoa\Console\Cursor::restore();' . "\n" .
     'Hoa\Console\Cursor::show();' . "\n";

           Hoa\Console\Cursor::save();
//sleep(1);  Hoa\Console\Cursor::hide();
sleep(1);  Hoa\Console\Cursor::move('LEFT');
sleep(1);  Hoa\Console\Cursor::move('↑');
sleep(1);  Hoa\Console\Cursor::move('↑');
sleep(1);  Hoa\Console\Cursor::move('↑');
sleep(1);  Hoa\Console\Cursor::clear('↔');
sleep(1);  echo 'Hahaha!';
sleep(1);  Hoa\Console\Cursor::restore();
//sleep(1);  Hoa\Console\Cursor::show();

echo "\n", '<eof>', "\n";
