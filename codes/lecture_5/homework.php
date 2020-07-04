<!doctype html>
<html lang="en">
<head>
    <title>Homework 5</title>
</head>
<body>

<?php
require_once __DIR__.'/db_settings.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$connection = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);

if ($action === 'list'):
    $statement = $statement = $connection->query('SELECT `first_name`, `last_name` FROM user;');
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['first_name']; ?></td>
                <td><?php echo $user['last_name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
elseif ($action === 'single'):
    $id = isset($_GET['action']) ? $_GET['id'] : 0;
    $statement = $statement = $connection->prepare('SELECT `first_name`, `last_name`, `age`, `email` FROM user WHERE id = :id;');
    $statement->bindParam(":id", $id);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
?>
    <p><b>First Name</b>: <?php echo $user['first_name']; ?></p>
    <p><b>Last Name</b>: <?php echo $user['last_name']; ?></p>
    <p><b>Age</b>: <?php echo $user['age']; ?></p>
    <p><b>Email</b>: <?php echo $user['email']; ?></p>
<?php
    elseif ($action === 'add'):
        if (empty($_POST)):
?>
            <form action="?action=add" method="post">
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

                <br><br>

                <input type="submit" value="Add User">
            </form>
        <?php
            else:
                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $age = $_POST['age'];
                $email = $_POST['email'];

                $statement = $connection->prepare('INSERT INTO user (`first_name`, `last_name`, `age`, `email`) VALUES (:first_name, :last_name, :age, :email);');
                $statement->bindParam(":first_name", $firstName);
                $statement->bindParam(":last_name", $lastName);
                $statement->bindParam(":age", $age);
                $statement->bindParam(":email", $email);
                $result = $statement->execute();

                echo "<h1>User has been created successfully!</h1>";
            endif
        ?>
<?php endif ?>
</body>
</html>
