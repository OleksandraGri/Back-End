<?php
// Перевірка, чи є cookie для шрифту
if (isset($_COOKIE['font_size'])) {
    $fontSize = $_COOKIE['font_size'];
} else {
    $fontSize = 'medium'; // значення за замовчуванням
}

// Якщо натиснули на посилання для зміни шрифту
if (isset($_GET['font'])) {
    $fontSize = $_GET['font'];
    setcookie('font_size', $fontSize, time() + (86400 * 30), "/"); // термін дії cookie - 30 днів
    header("Location: task1(index).php"); // перезавантажити сторінку, щоб застосувати зміни
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Зміна шрифтів за допомогою cookie</title>
    <style>
        /* Визначаємо стилі для різних розмірів шрифтів */
        body {
            font-size: 16px;
        }

        .font-small {
            font-size: 12px;
        }

        .font-medium {
            font-size: 16px;
        }

        .font-large {
            font-size: 24px;
        }

        /* Застосування шрифту на основі вибору користувача */
        <?php
        switch ($fontSize) {
            case 'small':
                echo "body { font-size: 12px; }";
                break;
            case 'medium':
                echo "body { font-size: 16px; }";
                break;
            case 'large':
                echo "body { font-size: 24px; }";
                break;
        }
        ?>
    </style>
</head>
<body>

<h1>Вибір розміру шрифтів</h1>

<!-- Посилання для зміни розміру шрифтів -->
<p><a href="?font=large">Великий шрифт</a></p>
<p><a href="?font=medium">Середній шрифт</a></p>
<p><a href="?font=small">Маленький шрифт</a></p>

<p>Це тестова сторінка, де ви можете змінити розмір шрифтів. Ваш вибір збережеться навіть після перезавантаження сторінки.</p>

</body>
</html>
