<?php
require_once __DIR__ . '/db_settings.php';

try {
    $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $statement = $connection->query('INSERT INTO user (`first_name`, `last_name`, `age`) VALUES ("Jane", "Doe", 26);');
} catch (PDOException $e) {
    echo $e->getMessage();
}
