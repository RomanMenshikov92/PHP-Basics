<?php
$array_url = [
  'https://www.php.net/manual/ru/function.include.php',
  'https://www.php.net/manual/ru/ref.filesystem.php',
  'https://www.php.net/manual/ru/tutorial.forms.php',
  'https://www.php.net/manual/ru/reserved.variables.php',
  'https://www.php.net/manual/ru/features.file-upload.post-method.php',
  'https://www.php.net/manual/ru/ref.json.php',
];
foreach ($array_url as $url) {
  exec("start $url");
}
?>