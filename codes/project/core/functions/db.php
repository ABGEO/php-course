<?php

require_once __DIR__ . '/../settings.php';

function connectToDB() {
    try {
        return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
