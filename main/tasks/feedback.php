<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Валидация
    if (empty($username) || empty($email) || empty($message)) {
        echo "Все поля обязательны для заполнения.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Неверный формат email.";
    } elseif (strlen($message) < 20) {
        echo "Сообщение должно содержать минимум 20 символов.";
    } else {
        echo "Спасибо за ваше сообщение!";
        // Здесь можно добавить код для отправки сообщения на email или сохранения в базу данных
    }
} else {
    echo "Неверный метод запроса.";
}
?>
