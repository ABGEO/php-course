<?php
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>

<header>
    <h1><a href="/">Blog</a></h1>

    <?php if (empty($username)): ?>
        <nav>
            <a href="login.php">Login</a> |
            <a href="registration.php">Registration</a>
        </nav>
    <?php else: ?>
        <p>
            Welcome, <a href="<?php echo "profile.php?username={$username}"; ?>"><?php echo $username; ?></a>! |
            <a href="edit_profile.php">Edit Profile</a> |
            <a href="new_blog.php">Add new Blog</a> |
            <a href="logout.php">Logout</a>
        </p>
    <?php endif ?>
</header>
