<?php
function printPerson($person) {
    echo "First Name:\t{$person['firstName']}\n";
    echo "Last Name:\t{$person['lastName']}\n";
    echo "Age:\t\t{$person['age']}\n";
}

$person = [
    "firstName" => "John",
    "lastName" => "Doe",
    "age" => 25,
];

printPerson($person);

// ---------------------------------------------------------------------------------------------------------------------

// Function without argument

function doSomething() {
    echo "Hello\n";
}

doSomething();
doSomething();
doSomething();
doSomething();

// ---------------------------------------------------------------------------------------------------------------------

// Function Arguments

function sum1($a, $b) {
    echo ($a + $b) . "\n";
}

sum1(10, 10);

// ---------------------------------------------------------------------------------------------------------------------

// Arguments default value

function sum2($a, $b = 5) {
    echo ($a + $b) . "\n";
}

sum2(10);

// ---------------------------------------------------------------------------------------------------------------------

// Function return value

function sum3($a, $b) {
    return $a + $b;
}

$sumResult = sum3(10, 10);
echo $sumResult;
