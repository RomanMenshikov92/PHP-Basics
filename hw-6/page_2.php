<?php
if(isset($_GET['text'])) {
    $text = $_GET['text'];
    header('Content-Disposition: attachment; filename="saved_text.txt"');
    echo $text;
} else {
  echo "Параметр 'text' не был передан.";
}