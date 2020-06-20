<?php
$personJson = "{\"firstName\":\"John\",\"lastName\":\"Doe\",\"age\":25}";
$person = json_decode($personJson, true);

var_dump($person);
