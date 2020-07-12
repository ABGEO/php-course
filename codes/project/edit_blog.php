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

if (!empty($_POST)) {
    $title = $_POST['title'];
    $body = $_POST['body'];

    $fileNames = [];
    if (
        (isset($_FILES['image-1']) && $_FILES['image-1']['size'] != 0)
        || (isset($_FILES['image-2']) && $_FILES['image-2']['size'] != 0)
    ) {
        if (!empty($blog['images'])) {
            $oldImages = explode('|', $blog['images']);

            foreach ($oldImages as $image) {
                if (file_exists(__DIR__ . '/files/blog_images/' . $image)) {
                    unlink(__DIR__ . '/files/blog_images/' . $image);
                }
            }
        }

        if ($_FILES['image-1']['size'] != 0) {
            $fileNames[] = uploadBlogImage($_FILES['image-1']);
        }

        if ($_FILES['image-2']['size'] != 0) {
            $fileNames[] = uploadBlogImage($_FILES['image-2']);
        }
    }

    $isUpdateSuccessfully = updateBlog($title, $body, $fileNames, $blogId);
    if ($isUpdateSuccessfully) {
        header("Location: single_blog.php?id={$blogId}");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title><?php echo $blog['title']; ?> - Edit | PHP Course</title>
</head>
<body>

<?php require_once __DIR__ . '/includes/header.tpl.php'; ?>

<br>
<br>

<form action="?id=<?php echo $blog['id']; ?>" method="post" enctype="multipart/form-data">
    <label for="image-1">Image 1</label> <br>
    <input type="file" id="image-1" name="image-1"> <br><br>

    <label for="image-2">Image 2</label> <br>
    <input type="file" id="image-2" name="image-2"> <br><br>

    <label for="title">Title</label> <br>
    <input type="text" name="title" id="title" required value="<?php echo $blog['title']; ?>"> <br><br>

    <label for="body">Body</label> <br>
    <textarea name="body" id="body" cols="60" rows="10"><?php echo $blog['body']; ?></textarea>

    <br>

    <input type="submit" value="Update">
</form>

</body>
</html>
