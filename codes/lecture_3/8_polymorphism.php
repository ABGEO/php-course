<?php

abstract class Car
{
    public function beep()
    {
        echo "Beep!\n";
    }
}

class Audi extends Car
{
    public function beep()
    {
        echo "Beep! Beep!\n";
    }
}

class Nisan extends Car
{
    public function beep()
    {
        echo "Beep! Beep! Beep!\n";
    }
}

$audi = new Audi();
$nisan = new Nisan();

$audi->beep();
$nisan->beep();
