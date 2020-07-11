<?php
session_start();
$formErrorMessage = null;

require_once __DIR__.'/core/functions/user.php';
require_once __DIR__.'/core/functions/password.php';

$isUpdatedSuccessfully = false;
$currentUsername = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if (empty($currentUsername)) {
    header("Location: 404.php");
}

$currentUser = getUserByUsername($currentUsername);

if (!empty($_POST)) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $oldPassword = $_POST['old-password'];
    $newPassword = $_POST['new-password'];
    $repeatPassword = $_POST['repeat-password'];

    $passwordForUpdate = null;
    if (!empty($oldPassword)) {
        $isOldPasswordCorrect = checkPassword($oldPassword, $currentUser['password']);

        if ($isOldPasswordCorrect) {
            if ($oldPassword == $newPassword) {
                $formErrorMessage = "New password should be different from old one";
            } else if ($newPassword != $repeatPassword) {
                $formErrorMessage = "Passwords does not match";
            } else {
                $passwordForUpdate = $newPassword;
            }
        } else {
            $formErrorMessage = "Old password is incorrect";
        }
    }

    if (empty($formErrorMessage)) {
        $fileName = null;
        if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] != 0) {
           $avatarsDirectory = __DIR__ . '/files/avatars/';
           $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
           $fileName = md5($currentUser['id']) . '_' . md5(time()) . '.' . $ext;

           move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarsDirectory . $fileName);

           if (!empty($currentUser['avatar']) && file_exists($avatarsDirectory . $currentUser['avatar'])) {
               unlink($avatarsDirectory . $currentUser['avatar']);
           }
        }

        $isUpdatedSuccessfully = updateUser($firstName, $lastName, $currentUser['id'], $passwordForUpdate, $fileName);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title><?php echo $currentUser['username']; ?> - Edit | PHP Course</title>
</head>
<body>

<?php require_once __DIR__ . '/includes/header.tpl.php'; ?>

<br>

<form action="?" method="post" enctype="multipart/form-data">
    <label for="avatar">Avatar</label> <br>
    <input type="file" id="avatar" name="avatar"> <br><br>

    <label for="username">Username</label> <br>
    <input type="text" name="username" id="username" value="<?php echo $currentUser['username']; ?>" readonly> <br>

    <label for="email">E-Mail</label> <br>
    <input type="email" name="email" id="email" value="<?php echo $currentUser['email']; ?>" readonly> <br>

    <label for="first-name">First Name</label> <br>
    <input type="text" name="first-name" id="first-name" value="<?php echo $currentUser['first_name']; ?>"> <br>

    <label for="last-name">Last Name</label> <br>
    <input type="text" name="last-name" id="last-name" value="<?php echo $currentUser['last_name']; ?>"> <br>

    <br><br>

    <label for="old-password">Old Password</label> <br>
    <input type="password" name="old-password" id="old-password"> <br>

    <label for="new-password">New Password</label> <br>
    <input type="password" name="new-password" id="new-password"> <br>

    <label for="repeat-password">Repeat Password</label> <br>
    <input type="password" name="repeat-password" id="repeat-password"> <br>

    <?php if ($isUpdatedSuccessfully): ?>
        <p style="color: green;">Your account has been updated successfully</p>
    <?php endif; ?>

    <?php if (!empty($formErrorMessage)): ?>
        <p style="color: red;"><?php echo $formErrorMessage; ?></p>
    <?php endif; ?>

    <input type="submit" value="Save">
</form>

</body>
</html>
