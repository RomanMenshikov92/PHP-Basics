<?php
$array_url = [
  'https://www.php.net/manual/ru/ref.datetime.php',
  'https://www.php.net/manual/ru/book.errorfunc.php',
  'https://www.php.net/manual/ru/language.exceptions.php',
];
foreach ($array_url as $url) {
  exec("start $url");
}
?>