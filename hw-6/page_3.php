<?php
session_start();

if (!isset($_SESSION['page_3_visits'])) {
    $_SESSION['page_3_visits'] = 1;
} else {
    $_SESSION['page_3_visits']++;
}

if ($_SESSION['page_3_visits'] % 3 === 0) {
    header('Location: page_4.php');
    exit();
}

echo "Страница 3 открыта ".$_SESSION['page_3_visits']." раз(а).";