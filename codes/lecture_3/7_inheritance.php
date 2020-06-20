<?php

class Car
{
    protected string $vendor = "";

    public function getVendor()
    {
        return $this->vendor;
    }
}

class Audi extends Car
{
    protected string $vendor = "Audi";
}

class Nisan extends Car
{
    protected string $vendor = "Nisan";

    function drift() {
        echo "Drift\n";
    }
}

$audi = new Audi();
$nisan = new Nisan();

echo $audi->getVendor()."\n";
echo $nisan->getVendor()."\n";

$nisan->drift();
