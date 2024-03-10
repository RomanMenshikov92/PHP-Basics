<?php
session_start();

if(isset($_POST['username']) && !empty($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
    $_SESSION['user_name'] = $username;
    header('Location: index.php');
    exit;
} else {
    echo "Пожалуйста, введите ваше имя.";
}
?>