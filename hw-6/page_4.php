<?php
session_start();

if (isset($_SESSION['page_3_visits'])) {
    echo 'Страница 4. Количество посещений страницы 3: ' . $_SESSION['page_3_visits'];
} else {
    echo 'Страница 4. Страница 3 не была посещена.';
}