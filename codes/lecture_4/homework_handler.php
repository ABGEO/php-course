<?php

class Person
{
    private string $name;
    private string $surname;
    private int $age;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
}

if (!empty($_POST)) {
    $person = new Person();

    $person->setName(htmlspecialchars($_POST['name']));
    $person->setSurname(htmlspecialchars($_POST['surname']));
    $person->setAge(htmlspecialchars($_POST['age']));

    var_dump($person);
}
