<?php

session_start();

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 100;
}

$_SESSION['counter']++;

echo "Counter value is: {$_SESSION['counter']}";
