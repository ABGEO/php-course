<?php
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>

<!doctype html>
<html lang="en">
<head>
    <title>Homepage | PHP Course</title>
</head>
<body>

<header>
    <?php if (empty($username)): ?>
        <nav>
            <a href="login.php">Login</a> |
            <a href="registration.php">Registration</a>
        </nav>
    <?php else: ?>
        <p>Welcome, <?php echo $username; ?>! | <a href="logout.php">Logout</a></p>
    <?php endif ?>
</header>

</body>
</html>
