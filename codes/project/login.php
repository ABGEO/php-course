<?php
$isCredentialsCorrect = true;

if (!empty($_POST)) {
    require_once __DIR__.'/core/functions/auth.php';
    require_once __DIR__.'/core/functions/password.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = getUserByEmailOrUsername($username);

    if ($user) {
        $isPasswordCorrect = checkPassword($password, $user['password']);

        if ($isPasswordCorrect) {
            $isCredentialsCorrect = true;
            session_start();
            $_SESSION['username'] = $username;

            header("Location: profile.php?username={$username}");
        } else {
            $isCredentialsCorrect = false;
        }
    } else {
        $isCredentialsCorrect = false;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Log In | PHP Course</title>
</head>
<body>

<?php require_once __DIR__ . '/includes/header.tpl.php'; ?>

<br>
<br>

<form action="?" method="post">
    <label for="username">Username or E-Mail</label> <br>
    <input type="text" name="username" id="username" required> <br>

    <label for="password">Password</label> <br>
    <input type="password" name="password" id="password" required> <br>

    <?php if ($isCredentialsCorrect == false): ?>
        <p style="color: red;">Credentials are incorrect</p>
    <?php endif; ?>

    <input type="submit" value="Log In">
</form>

</body>
</html>
