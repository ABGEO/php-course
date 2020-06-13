<?php

$name = "John";
$surname = "Doe";
$fullName = $name . " " . $surname;

echo $fullName;

echo "\n";

$fullName = "{$name} {$surname}";

echo $fullName;
