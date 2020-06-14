<?php

// Assignment Operators
$newVariable = "New Value";

$var = 1;
$var += 10; // 11

$var = 10;
$var -= 1; // 9

$var = 10;
$var *= 2; // 20

$var = 10;
$var /= 2; // 5

// ---------------------------------------------------------------------------------------------------------------------

// Math Operators

$a = 2;
$b = 6;

echo $a + $b;  // 8
echo $b - $a;  // 4
echo $a * $b;  // 12
echo $b / $a;  // 3
echo $b % $a;  // 0
echo $b ** $a; // 36

// ---------------------------------------------------------------------------------------------------------------------

// Increment/Decrement Operators

$a = 1;
$a++; // 2

$a = 2;
$a--; // 1

// ---------------------------------------------------------------------------------------------------------------------

// Comparison Operators

$a = 1;
$b = 2;
$c = "1";

var_dump($a == $b); // false
var_dump($a != $b); // true
var_dump($a > $b); // false
var_dump($a < $b); // true
var_dump($a >= $b); // false
var_dump($a <= $b); // true

var_dump($a == $c); // true
var_dump($a === $c); // false

// ---------------------------------------------------------------------------------------------------------------------

// Logical Operators

$a = 1;
$b = 2;
$c = 3;
$d = 4;

var_dump(($a > $b) && ($c < $d)); // false
var_dump(($a > $b) and ($c < $d)); // false

var_dump(($a < $b) && ($c < $d)); // true
var_dump(($a < $b) and ($c < $d)); // true

var_dump(($a > $b) || ($c < $d)); // true
var_dump(($a > $b) or ($c < $d)); // true

var_dump(($a < $b) || ($c < $d)); // true
var_dump(($a < $b) or ($c < $d)); // true
