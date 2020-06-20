<?php

class Car
{
    private string $vendor;
    private string $color;

    public function __construct($vendor)
    {
        $this->vendor = $vendor;
    }

    public function getVendor()
    {
        return $this->vendor;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }
}

$car = new Car("Audi");

$car->setColor("Black");
$car->setColor("White");

echo $car->getVendor()."\n";
echo $car->getColor()."\n";
