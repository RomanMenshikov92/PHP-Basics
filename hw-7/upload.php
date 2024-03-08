<?php
// Проверяем, был ли отправлен POST-запрос
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Проверяем наличие заполненного поля file_name
  if (empty($_POST["file_name"])) {
      header("Location: upload.php");
      exit;
  }

  // Проверяем наличие загруженного файла
  if (!isset($_FILES["content"]) || $_FILES["content"]["error"] != UPLOAD_ERR_OK) {
      header("Location: upload.php");
      exit;
  }

  // Получаем информацию о загруженном файле
  $file_name = $_POST["file_name"];
  $file_tmp = $_FILES["content"]["tmp_name"];
  $file_size = $_FILES["content"]["size"];
  $original_file_name = $_FILES["content"]["name"];

  // Указываем директорию для загрузки файлов
  $upload_dir = "upload/";

  // Проверяем существование директории upload и создаем ее, если она не существует
  if (!file_exists($upload_dir)) {
      mkdir($upload_dir, 0777, true);
  }
   // Получаем расширение файла
  $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);

  // Формируем путь для сохранения загруженного файла
  $upload_file = $upload_dir . $file_name . '.' . $file_extension;

  // Попытка переместить загруженный файл в указанную директорию
  if (move_uploaded_file($file_tmp, $upload_file)) {
      echo "Файл успешно загружен на сервер.<br>";
      echo "Путь к файлу: " . $upload_file . "<br>";
      echo "Размер файла: " . $file_size . " байт";
  } else {
    // Если произошла ошибка при загрузке файла, выводим соответствующее сообщение
      echo "Ошибка при загрузке файла.";
  }
} else {
  // Если данные не были отправлены методом POST, перенаправляем пользователя на страницу upload.html
  header("Location: upload.php");
  exit;
}
?>