<?php
$person = [
    "firstName" => "John",
    "lastName" => "Doe",
    "age" => 25,
];

$personJson = json_encode($person);

echo $personJson;
