<?php
class Person {
    private string $firstName;
    private string $lastName;
    private int $age;
    private string $email;
    private array $phones = [];

    public function __construct(string $firstName, string $lastName, int $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhones()
    {
        return $this->phones;
    }

    public function addPhone($phone)
    {
        $this->phones[] = $phone;
    }
}

function printPeople($people) {
    foreach ($people as $person) {
        echo "First Name:\t{$person->getFirstName()}\n";
        echo "Last Name:\t{$person->getLastName()}\n";
        echo "Age:\t\t{$person->getAge()}\n";
        echo "Email:\t\t{$person->getEmail()}\n";
        echo "Phone Numbers:\n";

        foreach ($person->getPhones() as $phone) {
            echo "\t\t$phone\n";
        }

        echo "---------------------------------\n";
    }
}

$person1 = new Person("John", "Doe", 25);
$person1->setEmail("john@doe.com");
$person1->addPhone("555 555 551");
$person1->addPhone("555 555 552");

$person2 = new Person("Jane", "Doe", 26);
$person2->setEmail("jane@doe.com");
$person2->addPhone("555 555 553");
$person2->addPhone("555 555 554");
$person2->addPhone("555 555 555");

$people = [$person1, $person2];

printPeople($people);
