<?php
session_start();

$currentUsername = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if (empty($currentUsername)) {
    header("Location: login.php");
}

if (!empty($_POST)) {
    $title = $_POST['title'];
    $body = $_POST['body'];

    require_once __DIR__ . '/core/functions/blog.php';

    $isBlogCreatedSuccessfully = createBlog($title, $body);
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>New Blog | PHP Course</title>
</head>
<body>

<?php require_once __DIR__ . '/includes/header.tpl.php'; ?>

<br>
<br>

<form action="?" method="post">
    <label for="title">Title</label> <br>
    <input type="text" name="title" id="title" required> <br><br>

    <label for="body">Body</label> <br>
    <textarea name="body" id="body" cols="60" rows="10"></textarea>

    <br>

    <input type="submit" value="Create">
</form>

</body>
</html>
