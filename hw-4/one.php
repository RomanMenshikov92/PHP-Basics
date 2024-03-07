<?php
$array_url = [
  'https://www.php.net/manual/ru/functions.user-defined.php',
];
foreach ($array_url as $url) {
  exec("start $url");
}
?>