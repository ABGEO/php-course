<?php
    session_start();

    require_once __DIR__ . '/core/functions/user.php';
    require_once __DIR__ . '/core/functions/blog.php';

    $loggedInUsername = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    $currentUsername = htmlspecialchars($_GET['username']);
    $currentUser = getUserByUsername($currentUsername);

    if (!$currentUser) {
        header("Location: 404.php");
    }

    $avatarsDirectory = '/files/avatars/';
?>

<!doctype html>
<html lang="en">
<head>
    <title><?php echo $currentUser['username']; ?> | PHP Course</title>
</head>
<body>

<?php require_once __DIR__ . '/includes/header.tpl.php'; ?>

<br>

<div class="profile">
    <?php if (!empty($currentUser['avatar'])): ?>
        <img src="<?php echo "{$avatarsDirectory}{$currentUser['avatar']}" ?>"
             alt="<?php echo $currentUser['username']; ?>'s Avatar" width="300">
    <?php endif; ?>

    <p><b>First Name</b>: <?php echo $currentUser['first_name']; ?></p>
    <p><b>Last Name</b>: <?php echo $currentUser['last_name']; ?></p>
</div>

<h1>User Blogs</h1>
<?php
$userBlogs = getUserBlogs($currentUser['id']);

if (empty($userBlogs)) {
    echo "<h3>This user has no blogs.</h3>";
}

foreach ($userBlogs as $blog):
    $summary = substr($blog['body'], 0, 200);
    $summary = nl2br($summary);
    $createdAt = new DateTime($blog['created_at']);
    $user = getUserById($blog['author']);
    ?>
    <article>
        <h1><?php echo $blog['title']; ?></h1>
        <p><b>Date</b>: <?php echo $createdAt->format('d/m/Y H:i:s'); ?></p>
        <?php if ($user['username'] == $loggedInUsername): ?>
            <a href="<?php echo "edit_blog.php?id={$blog['id']}"; ?>">Edit Blog</a> |
            <a href="<?php echo "remove_blog.php?id={$blog['id']}"; ?>">Remove Blog</a>
        <?php endif; ?>

        <p><?php echo $summary; ?> ...</p>

        <a href="<?php echo "single_blog.php?id={$blog['id']}"; ?>">Read More</a>
    </article>
<?php endforeach; ?>
</body>
</html>
