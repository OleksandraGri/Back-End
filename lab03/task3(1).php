<?php
// Назва файлу для збереження коментарів
$commentsFile = 'comments.json';

// Якщо форма була відправлена
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['comment'])) {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);

    // Читання існуючих коментарів з файлу
    $comments = [];
    if (file_exists($commentsFile)) {
        $comments = json_decode(file_get_contents($commentsFile), true);
    }

    // Додавання нового коментаря
    $comments[] = ['name' => $name, 'comment' => $comment];

    // Запис всіх коментарів назад в файл
    file_put_contents($commentsFile, json_encode($comments, JSON_PRETTY_PRINT));
}

// Виведення форми
?>
<form method="POST" action="">
    <label for="name">Ім’я:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="comment">Коментар:</label>
    <textarea id="comment" name="comment" required></textarea><br><br>

    <button type="submit">Додати коментар</button>
</form>

<h2>Поточні коментарі:</h2>

<table border="1">
    <tr>
        <th>Ім’я</th>
        <th>Коментар</th>
    </tr>

    <?php
    // Виведення всіх коментарів із файлу
    if (file_exists($commentsFile)) {
        $comments = json_decode(file_get_contents($commentsFile), true);
        foreach ($comments as $comment) {
            echo "<tr><td>{$comment['name']}</td><td>{$comment['comment']}</td></tr>";
        }
    }
    ?>

</table>

