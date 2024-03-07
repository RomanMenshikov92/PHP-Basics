<?php
$array_url = [
  'https://www.php.net/manual/ru/ref.strings.php',
  'https://www.php.net/manual/ru/book.math.php',
  'https://www.php.net/manual/ru/ref.array.php',
  'https://www.php.net/manual/ru/ref.pcre.php',
  'https://regex101.com/',
];
foreach ($array_url as $url) {
  exec("start $url");
}
?>