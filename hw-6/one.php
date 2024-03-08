<?php
$array_url = [
  'https://ru.wikipedia.org/wiki/%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA_%D0%BA%D0%BE%D0%B4%D0%BE%D0%B2_%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D1%8F_HTTP',
  'https://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%B3%D0%BE%D0%BB%D0%BE%D0%B2%D0%BA%D0%B8_HTTP',
  'https://www.php.net/manual/ru/function.header.php',
  'https://www.php.net/manual/ru/function.http-response-code.php',
  'https://www.php.net/manual/ru/function.setcookie.php',
];
foreach ($array_url as $url) {
  exec("start $url");
}
?>