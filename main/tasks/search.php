<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {
    $query = htmlspecialchars(trim($_GET['query']));

    // Валидация
    if (empty($query)) {
        echo "Введите поисковый запрос.";
    } else {
        echo "Результаты поиска для: " . $query;
        // Здесь может быть код для поиска в базе данных или API
    }
} else {
    echo "Неверный метод запроса.";
}
?>
