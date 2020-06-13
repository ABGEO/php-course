<?php
$int = 100;
$float = 3.14;
$string = "Hello";
$array = [];

$isInt = is_int($int);
$isFloat = is_float($float);
$isString = is_string($string);
$isArray = is_array($array);

var_dump($isInt);    // True
var_dump($isFloat);  // True
var_dump($isString); // True
var_dump($isArray);  // True

$number = 100;   // Declare as an integer.
$number = "100"; // Redeclare as string.

$isInt = is_int($number);
var_dump($isInt); // False
