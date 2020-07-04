<?php
    require_once __DIR__ . '/core/functions/user.php';

    $currentUsername = htmlspecialchars($_GET['username']);
    $currentUser = getUserByUsername($currentUsername);

    if (!$currentUser) {
        header("Location: 404.php");
    }
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
    <p><b>First Name</b>: <?php echo $currentUser['first_name']; ?></p>
    <p><b>Last Name</b>: <?php echo $currentUser['last_name']; ?></p>
</div>

<h1>User Blogs</h1>

</body>
</html>
