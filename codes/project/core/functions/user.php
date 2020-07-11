<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/password.php';

function getUserByUsername($username) {
    $connection = connectToDB();

    try {
        $statement = $connection->prepare("SELECT * FROM user WHERE `username` = :value;");
        $statement->bindParam("value", $username);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function getUserById($id) {
    $connection = connectToDB();

    try {
        $statement = $connection->prepare("SELECT * FROM user WHERE `id` = :value;");
        $statement->bindParam("value", $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function updateUser($firstName, $lastName, $id, $password = null, $avatar = null) {
    $connection = connectToDB();

    try {
        $query = "UPDATE user SET `first_name` = :first_name, `last_name` = :last_name";

        if (!empty($password)) {
            $query .= ", `password` = :password";
        }

        if (!empty($avatar)) {
            $query .= ", `avatar` = :avatar";
        }

        $query .= " WHERE id = :id;";

        $statement = $connection->prepare($query);
        $statement->bindParam(":first_name", $firstName);
        $statement->bindParam(":last_name", $lastName);
        $statement->bindParam("id", $id);

        if (!empty($password)) {
            $password = hashPassword($password);

            $statement->bindParam(":password", $password);
        }

        if (!empty($avatar)) {
            $statement->bindParam(":avatar", $avatar);
        }

        return $statement->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
