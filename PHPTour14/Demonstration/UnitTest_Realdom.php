<?php

namespace Tests\Units;

use atoum;

class StdClass extends atoum
{
    public function test_anInteger()
    {
        $this
            ->given($integer = $this->realdom->integer())
            ->when(function() use ($integer, & $value) {
                $value = $this->sample($integer);
            })
            ->then(
                print(' > ' . $value . PHP_EOL),
                $this->integer($value)
            )
        ;
    }

    public function test_someBoundFloat()
    {
        $this
            ->given(
                $interval = $this->realdom
                    ->boundFloat(3.14, 13.37)
                    ->or
                    ->boundFloat(42.0, 73.0)
            )
            ->when(function() use ($interval, & $values) {
                $values = $this->sampleMany($interval, 5);
            })
        ;

        //then
        foreach ($values as $value) {
            print(' > ' . $value . PHP_EOL);

            $this->float($value)
                ->isGreaterThanOrEqualTo(3.14)
                ->isLessThanOrEqualTo(73);
        }
    }

    public function test_regexBasedString()
    {
        $this
            ->given(
                $string = $this->realdom->regex('/(127|192)(\.[0-255]){2}\.[0-254](:\d{2,5})?/')
            )
            ->when(function() use ($string, & $value) {
                $value = $this->sample($string);
            })
            ->then(
                print(' > ' .$value . PHP_EOL),
                $this->string($value)->match('/(127|192)(\.[0-255]){2}\.[0-254](:\d{2,5})?/')
            )
        ;
    }
}
