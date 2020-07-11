<?php

session_start();

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/user.php';

function createBlog($title, $body, $images) {
    $connection = connectToDB();
    $currentUsername = $_SESSION['username'];
    $currentUser = getUserByUsername($currentUsername);
    $images = implode('|', $images);

    try {
        $statement = $connection->prepare("INSERT INTO `blog` (`title`, `author`, `body`, `images`) VALUES (:title, :author, :body, :images)");
        $statement->bindParam("title", $title);
        $statement->bindParam("author", $currentUser['id']);
        $statement->bindParam("body", $body);
        $statement->bindParam("images", $images);

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

function getUserBlogs($userId) {
    $connection = connectToDB();

    try {
        $statement = $connection->prepare("SELECT * FROM `blog` WHERE `author` = :author ORDER BY `id` DESC;");
        $statement->bindParam(":author", $userId);
        $statement->execute();

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

function uploadBlogImage($imageFile) {
    $imagesDirectory = __DIR__ . '/../../files/blog_images/';
    $ext = pathinfo($_FILES['image-1']['name'], PATHINFO_EXTENSION);
    $fileName = md5(time()) . '_' . md5($imageFile['name']) . '_' . md5($imageFile['tmp_name']) . '.' . $ext;

    move_uploaded_file($imageFile['tmp_name'], $imagesDirectory . $fileName);

    return $fileName;
}
