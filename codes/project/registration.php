<?php
$isFormError = false;
$isSuccessfullyRegistered = false;

if (!empty($_POST)) {
    require_once __DIR__ . '/core/functions/auth.php';

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password-2']);

    $isUsernameAvailable = checkUsernameOrEmail('username', $username);
    $isEmailAvailable = checkUsernameOrEmail('email', $email);
    $isPasswordEqual = $password == $password2;

    if ($isUsernameAvailable && $isEmailAvailable && $isPasswordEqual) {
        $isSuccessfullyRegistered = register($username, $email, $password);

        if ($isSuccessfullyRegistered) {
            session_start();
            $_SESSION['username'] = $username;
        }
    } else {
        $isFormError = true;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Registration | PHP Course</title>
</head>
<body>

<?php require_once __DIR__ . '/includes/header.tpl.php'; ?>

<br>
<br>

<form action="?" method="post">
    <label for="username">Username</label> <br>
    <?php if ($isFormError && $isUsernameAvailable == false): ?>
        <p style="color: red;">Username is taken</p>
    <?php endif; ?>
    <input type="text" name="username" id="username" required> <br>

    <label for="email">Email</label> <br>
    <?php if ($isFormError && $isEmailAvailable == false): ?>
        <p style="color: red;">Email is taken</p>
    <?php endif; ?>
    <input type="email" name="email" id="email" required> <br>

    <label for="password">Password</label> <br>
    <input type="password" name="password" id="password" required> <br>

    <label for="password-2">Repeat Password</label> <br>
    <?php if ($isFormError && $isPasswordEqual == false): ?>
        <p style="color: red;">Passwords does not match</p>
    <?php endif; ?>
    <input type="password" name="password-2" id="password-2" required> <br><br>

    <?php if ($isSuccessfullyRegistered): ?>
        <p style="color: green;">Your account has been created successfully</p>
    <?php endif; ?>

    <input type="submit" value="Register">
</form>

</body>
</html>
