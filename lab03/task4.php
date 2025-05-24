<?php
$uploadDir = 'uploads/';

// Створюємо директорію, якщо її немає
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$message = '';

// Обробка завантаження файлу
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];

    // Перевіряємо на помилки
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Перевіряємо тип файлу
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($file['type'], $allowedTypes)) {
            // Генеруємо унікальне ім'я файлу
            $filename = uniqid() . '_' . basename($file['name']);
            $destination = $uploadDir . $filename;

            // Переміщуємо файл
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $message = "Файл успішно завантажено: $filename";
            } else {
                $message = "Помилка при збереженні файлу";
            }
        } else {
            $message = "Дозволені лише зображення (JPEG, PNG, GIF)";
        }
    } else {
        $message = "Помилка при завантаженні файлу: " . $file['error'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Завантаження зображень</title>
</head>
<body>
<h1>Завантажити зображення</h1>

<?php if ($message): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/jpeg,image/png,image/gif" required>
    <button type="submit">Завантажити</button>
</form>

<h2>Завантажені зображення:</h2>
<?php
$images = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
foreach ($images as $image): ?>
    <img src="<?php echo $image; ?>" height="100" style="margin: 10px;">
<?php endforeach; ?>
</body>
</html>