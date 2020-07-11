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

    $imagesDirectory = __DIR__ . '/files/blog_images/';

    $fileNames = [];
    if (isset($_FILES['image-1']) && $_FILES['image-1']['size'] != 0) {
        $fileNames[] = uploadBlogImage($_FILES['image-1']);
    }

    if (isset($_FILES['image-2']) && $_FILES['image-2']['size'] != 0) {
        $fileNames[] = uploadBlogImage($_FILES['image-2']);
    }

    $isBlogCreatedSuccessfully = createBlog($title, $body, $fileNames);
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

<form action="?" method="post" enctype="multipart/form-data">
    <label for="image-1">Image 1</label> <br>
    <input type="file" id="image-1" name="image-1"> <br><br>

    <label for="image-2">Image 2</label> <br>
    <input type="file" id="image-2" name="image-2"> <br><br>

    <label for="title">Title</label> <br>
    <input type="text" name="title" id="title" required> <br><br>

    <label for="body">Body</label> <br>
    <textarea name="body" id="body" cols="60" rows="10"></textarea>

    <br>

    <input type="submit" value="Create">
</form>

</body>
</html>
