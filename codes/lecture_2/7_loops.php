<?php

// While loop

$number = 0;
while ($number < 10) {
    echo "The number is: {$number}\n";
    $number++;
}

// ---------------------------------------------------------------------------------------------------------------------

// Do-While loop

$number = 0;
do {
    echo "The number is: {$number}\n";
    $number++;
} while ($number < 10);

// ---------------------------------------------------------------------------------------------------------------------

// For loop

for ($i = 0; $i < 10; $i++) {
    echo "The number is: {$i}\n";
}

$names = ["John", "Joana", "Bob", "Alice"];

for ($i = 0; $i < 4; $i++) {
    echo "{$names[$i]}\n";
}

// ---------------------------------------------------------------------------------------------------------------------

// Foreach loop

foreach ($names as $name) {
    echo "{$name}\n";
}
