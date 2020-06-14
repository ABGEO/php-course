<?php
$people = [
    [
        "firstName" => "John",
        "lastName" => "Doe",
        "age" => 25,
        "email" => "john@doe.com",
        "phones" => [
            "555 555 551",
            "555 555 552",
        ],
    ],
    [
        "firstName" => "Joana",
        "lastName" => "Doe",
        "age" => 26,
        "email" => "joana@doe.com",
        "phones" => [
            "555 555 553",
            "555 555 554",
        ],
    ],
];

echo $people[0]["phones"][0];
