<?php

session_start();

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/user.php';

function createBlog($title, $body) {
    $connection = connectToDB();
    $currentUsername = $_SESSION['username'];
    $currentUser = getUserByUsername($currentUsername);

    try {
        $statement = $connection->prepare("INSERT INTO `blog` (`title`, `author`, `body`) VALUES (:title, :author, :body)");
        $statement->bindParam("title", $title);
        $statement->bindParam("author", $currentUser['id']);
        $statement->bindParam("body", $body);

        return $statement->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function updateBlog($title, $body, $id) {
    $connection = connectToDB();

    try {
        $statement = $connection->prepare("UPDATE `blog` SET `title` = :title, `body` = :body WHERE `id` = :id");
        $statement->bindParam("title", $title);
        $statement->bindParam("body", $body);
        $statement->bindParam("id", $id);

        return $statement->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function getAllBlogs() {
    $connection = connectToDB();

    try {
        $statement = $connection->query("SELECT * FROM `blog` ORDER BY `id` DESC;");

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function getBlogById($id) {
    $connection = connectToDB();

    try {
        $statement = $connection->prepare("SELECT * FROM `blog` WHERE `id` = :id;");
        $statement->bindParam(":id", $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function removeBlog($id) {
    $connection = connectToDB();

    try {
        $statement = $connection->prepare("DELETE FROM `blog` WHERE `id` = :id;");
        $statement->bindParam(":id", $id);

        return $statement->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
