<?php
// Проверяем, что данные были отправлены методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем и фильтруем данные
    $username = htmlspecialchars(trim($_POST['username']));
    $rating = intval($_POST['rating']);
    $review = htmlspecialchars(trim($_POST['review']));
 // Валидация данных
 if (empty($username)) {
    echo "Пожалуйста, введите ваше имя.";
} elseif ($rating < 1 || $rating > 5) {
    echo "Оценка должна быть числом от 1 до 5.";
} elseif (empty($review)) {
    echo "Пожалуйста, оставьте отзыв.";
} else {
    // Если все данные корректны, их можно сохранить в базу данных
    // Подключаемся к базе данных (например, через MySQLi или PDO)
    // Пример через PDO:
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Подготовленный запрос для защиты от SQL-инъекций
        $stmt = $pdo->prepare("INSERT INTO reviews (username, rating, review) VALUES (:username, :rating, :review)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':review', $review);

        // Выполняем запрос
        if ($stmt->execute()) {
            echo "Спасибо за ваш отзыв!";
        } else {
            echo "Произошла ошибка при отправке отзыва.";
        }
    } catch (PDOException $e) {
        echo "Ошибка подключения к базе данных: " . $e->getMessage();
    }
}
} else {
echo "Неправильный метод запроса.";
}