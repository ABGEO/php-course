<?php
require_once __DIR__ . '/db_settings.php';

if (!empty($_POST)) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    try {
        $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $statement = $connection->prepare('INSERT INTO user (`first_name`, `last_name`, `age`, `email`, `password`) VALUES (:first_name, :last_name, :age, :email, :password);');
        $statement->bindParam(":first_name", $firstName);
        $statement->bindParam(":last_name", $lastName);
        $statement->bindParam(":age", $age);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $password);
        $result = $statement->execute();

        var_dump($result);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
