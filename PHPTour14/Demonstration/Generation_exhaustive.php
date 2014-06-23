<?php

require '/usr/local/lib/Hoa/Core/Core.php';

$sampler = new Hoa\Compiler\Llk\Sampler\BoundedExhaustive(
    Hoa\Compiler\Llk\Llk::load(
        new Hoa\File\Read('Json.pp')
    ),
    new Hoa\Regex\Visitor\Isotropic(
        new Hoa\Math\Sampler\Random()
    ),
    15
);

foreach($sampler as $i => $value)
    echo $i, ' => ', $value, "\n";
