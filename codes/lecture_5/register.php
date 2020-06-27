<!doctype html>
<html lang="en">
<head>
    <title>Registration</title>
</head>
<body>

<form action="registration_handler.php" method="post">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name">

    <br>

    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name">

    <br>

    <label for="age">Age</label>
    <input type="number" name="age" id="age">

    <br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email">

    <br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <br><br>

    <input type="submit" value="Register">
</form>

</body>
</html>
