<!-- 
Подготовка рабочей среды
1. Скачал готовый комбайн XAMPP.
2. Распаковал и положил на диск С
3. Переименовал файл php.ini-development на php.ini, затем внутри этого файла заменил строку ";extension=mbstring " на ";extension=php_mbstring.dll"
4. В Windows прописал путь в системных переменных до PHP
5. В VS Code прописал путь
  "php.validate.executablePath": "C:/xampp/php/php.exe",
  "php.debug.executablePath": "C:/xampp/php/php.exe",
  "php.executablePath": "C:/xampp/php/php.exe",
  "phpserver.phpPath": "C:/xampp/php/php.exe",
  "php.executables": {},
  "php.format.rules.removeReduntandClosingTag": false,
  "php.validate.enable": true,
  "php.suggest.basic": true
-->