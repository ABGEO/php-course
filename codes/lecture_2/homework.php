<?php
function printPeople($people) {
    foreach ($people as $person) {
        echo "First Name:\t{$person['firstName']}\n";
        echo "Last Name:\t{$person['lastName']}\n";
        echo "Age:\t\t{$person['age']}\n";
        echo "Email:\t\t{$person['email']}\n";
        echo "Phone Numbers:\n";

        foreach ($person['phones'] as $phone) {
            echo "\t\t$phone\n";
        }

        echo "---------------------------------\n";
    }
}

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
        "firstName" => "Jane",
        "lastName" => "Doe",
        "age" => 26,
        "email" => "jane@doe.com",
        "phones" => [
            "555 555 553",
            "555 555 554",
            "555 555 555",
        ],
    ],
];

printPeople($people);
