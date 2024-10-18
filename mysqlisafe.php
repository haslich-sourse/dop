<?php
$host = 'localhost';
$db = 'testdb';
$user = 'root';
$pass = '';
$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Проверка данных из формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Подготовленный запрос
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    
    // Привязка параметров
    $stmt->bind_param("ss", $username, $password);
    
    // Выполнение запроса
    $stmt->execute();
    
    // Получение результатов
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Пользователь найден!";
    } else {
        echo "Неверный логин или пароль.";
    }

    $stmt->close();
}
$mysqli->close();
?>

<!-- Форма для отправки данных -->
<form method="POST" action="">
    <label for="username">Логин:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" value="Войти">
</form>
