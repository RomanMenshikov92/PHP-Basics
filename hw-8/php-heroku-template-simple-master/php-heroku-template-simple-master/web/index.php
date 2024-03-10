<?php
session_start();

if (!empty($_SESSION['user_name'])) {
    echo "Здравствуйте, {$_SESSION['user_name']}!<br>";
    echo '<a href="exit.php">Выйти</a>';
} else {
    include 'form.php';
}
?>
