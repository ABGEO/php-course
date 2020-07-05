<!doctype html>
<html lang="en">
<head>
    <title>Homepage | PHP Course</title>
</head>
<body>

<?php
require_once __DIR__ . '/includes/header.tpl.php';
require_once __DIR__ . '/core/functions/blog.php';
require_once __DIR__ . '/core/functions/user.php';

$blogs = getAllBlogs();

foreach ($blogs as $blog):
    $summary = substr($blog['body'], 0, 200);
    $summary = nl2br($summary);
    $createdAt = new DateTime($blog['created_at']);
    $user = getUserById($blog['author']);
?>
    <article>
        <h1><?php echo $blog['title']; ?></h1>
        <p><b>Author</b>:  <a href="<?php echo "profile.php?username={$user['username']}"; ?>"><?php echo $user['username']; ?></a></p>
        <p><b>Date</b>: <?php echo $createdAt->format('d/m/Y H:i:s'); ?></p>

        <p><?php echo $summary; ?> ...</p>

        <a href="<?php echo "single_blog.php?id={$blog['id']}"; ?>">Read More</a>
    </article>
<?php endforeach; ?>

</body>
</html>
