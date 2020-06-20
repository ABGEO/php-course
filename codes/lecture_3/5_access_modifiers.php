<?php

class Car
{
    private string $vendor;

    private function beep()
    {
        echo "Beep! Beep!\n";
    }

    public function doBeep()
    {
        $this->beep();
    }
}

$car = new Car();
$car->vendor = "Audi";

echo $car->vendor."\n";

$car->beep();
$car->doBeep();
