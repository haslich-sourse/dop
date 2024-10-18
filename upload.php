<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $file = $_FILES['uploaded_file'];
      
      // Проверка на ошибки при загрузке
      if ($file['error'] === UPLOAD_ERR_OK) {
          $tmp_name = $file['tmp_name'];
          $name = basename($file['name']);
          move_uploaded_file($tmp_name, "uploads/$name");
          echo "Файл успешно загружен.";
      } else {
          echo "Ошибка загрузки файла.";
      }
  }
?>
