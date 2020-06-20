<?php

// Define a Car class
class Car
{
    // Class properties

    public string $vendor;

    public string $color;

    // Class constructor.

    public function __construct($vendor)
    {
        $this->vendor = $vendor;
    }

    // Class methods go here

    public function beep()
    {
        echo "Beep! Beep!\n";
    }

    public function drift()
    {
        echo "Look at me, I'm drifting!\n";
    }

    // Define Magic Methods

    public function __toString()
    {
        return "{$this->color} {$this->vendor}";
    }
}

// Create new object of Car class
$car = new Car("Audi");

$car->color = "Black";

// Call __toString() magic method.
echo $car . "\n";

echo $car->vendor . "\n";
echo $car->color . "\n";

$car->beep();
$car->drift();
