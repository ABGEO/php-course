<?php

// Date & Time functions

echo date("Y-m-d");
echo date("d/m/Y");
echo time();

// ---------------------------------------------------------------------------------------------------------------------

// String manipulation functions

$string = "hello";

echo strlen($string);                        // 5
echo strpos($string, "e");           // 1
echo strpos($string, "l", 3); // 3
echo str_repeat($string, 3);      // hellohellohello
echo strtoupper($string);                   // HELLO
echo ucfirst($string);                      // Hello
echo substr($string, 2);              // llo
echo substr($string, 1, 3);    // ell

// ---------------------------------------------------------------------------------------------------------------------

// Math functions

echo abs(-10);              // 10
echo max([10, 15]);                 // 15
echo pow(5, 2);          // 25
echo round(2.166, 1); // 2.2
echo round(2.166, 2); // 2.17
