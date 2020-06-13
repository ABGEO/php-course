<?php

//Numeric Arrays

$numericArray = ["Dog", "Cat"];
var_dump($numericArray); // Dog, Cat

$numericArray[] = "Snake";
var_dump($numericArray); // Dog, Cat, Snake

$numericArray[2] = "Tiger";
var_dump($numericArray); // Dog, Cat, Tiger

// ---------------------------------------------------------------------------------------------------------------------

// Associative Arrays

$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 25,
];

echo $person["name"]; // John
echo "\n";
echo $person["surname"]; // Doe

$person["name"] = "Joana";

echo "\n\n";
echo $person["name"]; // Joana
echo "\n";
echo $person["surname"]; // Doe

// ---------------------------------------------------------------------------------------------------------------------

// Multidimensional Arrays

$people = [
    "john_doe" => [
        "name" => "John",
        "surname" => "Doe",
        "age" => 25,
    ],
    "joana_doe" => [
        "name" => "Joana",
        "surname" => "Doe",
        "age" => 25,
    ]
];

echo $people["john_doe"]["name"]; // John
