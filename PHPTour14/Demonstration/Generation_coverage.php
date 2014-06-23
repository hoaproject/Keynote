<?php

require '/usr/local/lib/Hoa/Core/Core.php';

$sampler = new Hoa\Compiler\Llk\Sampler\Coverage(
    Hoa\Compiler\Llk\Llk::load(
        new Hoa\File\Read('Json.pp')
    ),
    new Hoa\Regex\Visitor\Isotropic(
        new Hoa\Math\Sampler\Random()
    )
);

foreach($sampler as $i => $value)
    echo $i, ' => ', $value, "\n";
