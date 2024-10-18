<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Валидация
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Неправильный формат email.";
    } elseif ($password !== $confirm_password) {
        echo "Пароли не совпадают.";
    } else {
        echo "Регистрация успешна.";
        // Здесь можно добавить код для сохранения данных в базу
    }
} else {
    echo "Неверный метод запроса.";
}
?>
