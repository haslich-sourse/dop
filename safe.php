<?php
// Подключение к базе данных через PDO
$host = 'localhost';
$db = 'testdb';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Проверка данных из формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем данные из формы
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Подготовка SQL-запроса с использованием подготовленных выражений
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    
    // Привязка параметров
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    
    // Выполнение запроса
    $stmt->execute();
    
    // Проверка результатов
    if ($stmt->rowCount() > 0) {
        echo "Пользователь найден!";
    } else {
        echo "Неверный логин или пароль.";
    }
}
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
