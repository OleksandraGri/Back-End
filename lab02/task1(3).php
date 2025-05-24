<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filePath = $_POST['filePath'];

    $fileNameWithExtension = basename($filePath);

    $fileNameWithoutExtension = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab02(task1(3))</title>
</head>
<body>
<h2>Виділення імені файлу без розширення</h2>
<form method="post" action="">
    <label for="filePath">Введіть повний шлях до файлу:</label><br>
    <input type="text" name="filePath" id="filePath" value="<?php echo isset($filePath) ? htmlspecialchars($filePath) : ''; ?>"><br><br>

    <input type="submit" value="Виділити ім'я файлу">
</form>

<?php if (isset($fileNameWithoutExtension)): ?>
    <h3>Ім'я файлу без розширення:</h3>
    <p><?php echo htmlspecialchars($fileNameWithoutExtension); ?></p>
<?php endif; ?>
</body>
</html>

