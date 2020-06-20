<?php

interface Movable
{
    function move();
}

class Car implements Movable
{
    function move()
    {
        echo "This Car moves.\n";
    }
}

class Person implements Movable
{
    function move()
    {
        echo "This Person moves.\n";
    }
}

$car = new Car();
$person = new Person();

$car->move();
$person->move();
