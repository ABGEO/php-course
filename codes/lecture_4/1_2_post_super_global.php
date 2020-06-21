<?php
// Curl: curl -d "name=John&surname=Doe" -X POST http://127.0.0.1:8000/1_2_post_super_global.php

print_r($_POST);

$name = $_POST['name'];
$surname = $_POST['surname'];

echo "{$name} {$surname}"; // John Doe
