<?php
require_once __DIR__ . '/db_settings.php';

try {
    $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    // Select all from User table.
    $statement = $connection->query('SELECT * FROM user;');

    // Select only first and last names from User table.
    $statement = $connection->query('SELECT `first_name`, `last_name` FROM user;');

    // Select all from User table where First Name is John.
    $statement = $connection->query('SELECT * FROM user WHERE first_name = "John";');

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    print_r($data);
} catch (PDOException $e) {
    echo $e->getMessage();
}
