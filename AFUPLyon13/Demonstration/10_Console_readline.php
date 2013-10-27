<?php

require '/usr/local/lib/Hoa/Core/Core.php';

$readline = new Hoa\Console\Readline();
$readline->setAutocompleter(new Hoa\Console\Readline\Autocompleter\Word(
    get_defined_functions()['internal']
));

do {

    $line = $readline->readLine('> ');

    if(false === $line || 'quit' === $line)
        break;

    echo $line, "\n";

} while(true);
