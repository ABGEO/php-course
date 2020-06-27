<?php
require_once __DIR__ . '/db_settings.php';

try {
    $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $statement = $connection->query('UPDATE user SET `age` = 27 WHERE id = 1;');
} catch (PDOException $e) {
    echo $e->getMessage();
}
