<?php
$a = 10;

function someFunction() {
    global $a;
    $a = 1000;
    echo "{$a}\n";
}

echo "{$a}\n";  // 10
someFunction(); // 1000
echo "{$a}\n";  // 1000
