<?php
session_start();

require_once __DIR__ . '/core/functions/blog.php';
require_once __DIR__ . '/core/functions/user.php';

$blogId = $_GET['id'];
$blog = getBlogById($blogId);
$author = getUserById($blog['author']);
$currentUsername = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if (empty($blog)) {
    header("Location: 404.php");
}

if ($author['username'] != $currentUsername) {
    header("Location: 404.php");
}

$isSuccessfullyRemoved = removeBlog($blog['id']);
if ($isSuccessfullyRemoved) {
    header("Location: /");
} else {
    header("Location: 404.php");
}
