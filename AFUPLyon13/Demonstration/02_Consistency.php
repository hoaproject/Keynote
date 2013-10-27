<?php

require '/usr/local/lib/Hoa/Core/Core.php';

var_dump(Hoa\Core\Consistency::entityExists('Hoa\Core\Consistency'));
var_dump(Hoa\Core\Consistency::isKeyword('yield'));
var_dump(Hoa\Core\Consistency::isIdentifier('ƒ'));
