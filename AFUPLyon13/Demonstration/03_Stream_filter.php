<?php

require '/usr/local/lib/Hoa/Core/Core.php';

// 1. Filter.
class MyFilter extends Hoa\Stream\Filter\Basic {

    public function filter ( $in, $out, &$consumed, $closing ) {

        $iBucket = new Hoa\Stream\Bucket($in);
        $oBucket = new Hoa\Stream\Bucket($out);

        while(false === $iBucket->eob()) {

            $consumed += $iBucket->getLength();

            // 2. To upper case.
            $iBucket->setData(mb_strtoupper($iBucket->getData()));

            $oBucket->append($iBucket);
        }

        unset($iBucket);
        unset($oBucket);

        return self::PASS_ON;
    }
}

// 3. Register filter.
Hoa\Stream\Filter::register('my', 'MyFilter');

// 4. Open a stream.
$file = new Hoa\File\Read(__FILE__);

// 5. Apply the filter.
Hoa\Stream\Filter::append($file, 'my', Hoa\Stream\Filter::READ);

// 6. Use the stream!
echo $file->readAll();
