<?php
$array_url = [
  'https://nginx.org/ru/',
  'https://httpd.apache.org/',
  'https://www.php.net/manual/ru/features.commandline.webserver.php',
  'https://devcenter.heroku.com/articles/getting-started-with-php',
];
foreach ($array_url as $url) {
  exec("start $url");
}
?>