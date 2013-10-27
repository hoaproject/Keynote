<?php

require '/usr/local/lib/Hoa/Core/Core.php';

// 1. Load grammar.
$compiler = Hoa\Compiler\Llk::load(new Hoa\File\Read('12__Json.pp'));

// 2. Parse a data.
$ast      = $compiler->parse('{"foo": true, "bar": [null, 42]}');

// 3. Dump the AST.
$dump     = new Hoa\Compiler\Visitor\Dump();
echo $dump->visit($ast);
