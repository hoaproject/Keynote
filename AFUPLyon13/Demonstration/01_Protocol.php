<?php

require '/usr/local/lib/Hoa/Core/Core.php';

Hoa\Registry::set('foo', 'bar');

// Resolve!
var_dump(resolve('hoa://Library/Registry#foo'));
