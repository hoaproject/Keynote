<?php

require '/usr/local/lib/Hoa/Core/Core.php';

$readline = new Hoa\Console\Readline();
$readline->setAutocompleter(new Hoa\Console\Readline\Autocompleter\Word(
    get_defined_functions()['internal']
));
$readline->addMapping('\C-R', function ( Hoa\Console\Readline $self ) {

    // Clear the line.
    Hoa\Console\Cursor::clear('↔');
    echo $self->getPrefix();

    // Get the line text.
    $line = $self->getLine();

    // New line.
    $new  = null;

    // Loop over all characters.
    for($i = 0, $max = $self->getLineLength(); $i < $max; ++$i) {

        $char = mb_substr($line, $i, 1);

        if($char === $lower = mb_strtolower($char))
            $new .= mb_strtoupper($char);
        else
            $new .= $lower;
    }

    // Set the new line.
    $self->setLine($new);

    // Set the buffer (and let the readline echoes or not).
    $self->setBuffer($new);

    // The readline will continue to read.
    return $self::STATE_CONTINUE;
});

do {

    $line = $readline->readLine('> ');

    if(false === $line || 'quit' === $line)
        break;

    echo $line, "\n";

} while(true);
