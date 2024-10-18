<?php

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $search = $_GET['search'];
      echo "Вы искали: " . htmlspecialchars($search);
  }


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      
      // Валидация
      if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "Имя: " . htmlspecialchars($name) . "<br>";
          echo "Email: " . htmlspecialchars($email) . "<br>";
          echo "Сообщение: " . htmlspecialchars($message);
      } else {
          echo "Пожалуйста, проверьте введенные данные.";
      }
  }

