<?php

// Unset/Remove a variable from memory.

$a = 100;
echo $a;
echo "\n";
unset($a);
echo $a;

// ---------------------------------------------------------------------------------------------------------------------

// Unset/remove an array element from memory.

$array = ["Dog", "Cat", "Tiger"];
var_dump($array);
unset($array[2]);
var_dump($array);
