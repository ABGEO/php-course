<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/password.php';

function checkUsernameOrEmail($type, $value) {
    $connection = connectToDB();

    $query = "";
    if ($type == 'username') {
        $query = "SELECT id FROM user WHERE `username` = :value;";
    } else if ($type = 'email') {
        $query = "SELECT id FROM user WHERE `email` = :value;";
    }

    try {
        $statement = $connection->prepare($query);
        $statement->bindParam("value", $value);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return empty($result);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function register($username, $email, $password) {
    $password = hashPassword($password);
    $connection = connectToDB();

    try {
        $statement = $connection->prepare('INSERT INTO user (`username`, `email`, `password`) VALUES (:username, :email, :password);');
        $statement->bindParam(":username", $username);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $password);

        return $statement->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function getUserByEmailOrUsername($value) {
    $connection = connectToDB();

    try {
        $statement = $connection->prepare("SELECT `password` FROM user WHERE `email` = :value or `username` = :value;");
        $statement->bindParam("value", $value);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
