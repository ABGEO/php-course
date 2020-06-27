<!doctype html>
<html>
<head>
    <title>SQL Injection</title>
</head>
<body>

<form action="?" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <input type="submit" value="Find">
</form>

<?php
require_once __DIR__ . '/db_settings.php';

if (!empty($_POST)) {
    $name = $_POST['name'];

    try {
        $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $statement = $connection->prepare("SELECT * FROM user WHERE `first_name` = :name;");
        $statement->bindParam(":name", $name);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo '<pre>';
        print_r($result);
        echo '</pre>';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

</body>
</html>
