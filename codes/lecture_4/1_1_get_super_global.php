<?php

// URL: ?name=John&surname=Doe

var_dump($_GET);

$name = $_GET['name'];
$surname = $_GET['surname'];

echo "{$name} {$surname}";
