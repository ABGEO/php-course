<!doctype html>
<html lang="en">
<head>
    <title>Say Hello</title>
</head>
<body>

<?php if (empty($_POST)): ?>
    <form action="?" method="post">
        <label for="name">Enter your name:</label>
        <input type="text" name="name" id="name">
        <input type="submit" value="GO">
    </form>
<?php else: ?>
    <h1>Hello, <?php echo $_POST['name']; ?>!</h1> <!-- Unsecured -->
    <h1>Hello, <?php echo htmlspecialchars($_POST['name']); ?>!</h1> <!-- Secured -->
<?php endif; ?>

</body>
</html>
