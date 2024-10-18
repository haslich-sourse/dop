<?php
// Защищаемся от XSS, преобразуя специальные символы в HTML-сущности
if (isset($_POST['message'])) {
    echo "<h3>Вы ввели:</h3>";
    echo htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');  // Защищаем вывод
}
