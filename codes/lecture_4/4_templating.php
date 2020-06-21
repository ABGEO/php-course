<!doctype html>
<html lang="en">
<head>
    <title>Hello, World</title>
</head>
<body>
<?php
    echo "<h1>Hello, World!</h1>";
    echo "<p>" . date("d/m/Y") . "</p>";
?>

<h2>Numbers: </h2>
<?php
    for ($i = 1; $i <= 10; $i++) {
        echo "<p>{$i}</p>\n";
    }
?>

</body>
</html>
