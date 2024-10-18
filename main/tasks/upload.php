<?php



// Дальше код страницы

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Проверка на допустимые типы файлов
    $allowed_types = ['image/jpeg', 'image/png'];
    if (!in_array($file['type'], $allowed_types)) {
        echo "Можно загружать только файлы JPEG или PNG.";
    } elseif ($file['size'] > 2 * 1024 * 1024) {
        echo "Файл не должен превышать 2 МБ.";
    } else {
        // Путь для загрузки файла
        $upload_dir = 'uploads/';
        $file_path = $upload_dir . basename($file['name']);

        // Перемещаем загруженный файл в нужную директорию
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            echo "Файл успешно загружен.";
        } else {
            echo "Произошла ошибка при загрузке файла.";
        }
    }
} else {
    echo "Файл не был загружен.";
}
?>
