<?php
session_start();

require_once __DIR__ . '/core/functions/blog.php';
require_once __DIR__ . '/core/functions/user.php';

$blogId = $_GET['id'];
$blog = getBlogById($blogId);

if (empty($blog)) {
    header("Location: 404.php");
}

$createdAt = new DateTime($blog['created_at']);
$user = getUserById($blog['author']);

$currentUsername = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>

<!doctype html>
<html lang="en">
<head>
    <title><?php echo $blog['title']; ?> | PHP Course</title>
</head>
<body>

<?php require_once __DIR__ . '/includes/header.tpl.php'; ?>

<article>
    <h1><?php echo $blog['title']; ?></h1>

    <?php if ($user['username'] == $currentUsername): ?>
    <a href="<?php echo "edit_blog.php?id={$blog['id']}"; ?>">Edit Blog</a> |
    <a href="<?php echo "remove_blog.php?id={$blog['id']}"; ?>">Remove Blog</a>
    <?php endif; ?>

    <p><b>Author</b>: <a href="<?php echo "profile.php?username={$user['username']}"; ?>"><?php echo $user['username']; ?></a></p>
    <p><b>Date</b>: <?php echo $createdAt->format('d/m/Y H:i:s'); ?></p>

    <p><?php echo nl2br($blog['body']); ?></p>
</article>

</body>
</html>
