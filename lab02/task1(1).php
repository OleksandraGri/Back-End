<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];
    $find = $_POST['find'];
    $replace = $_POST['replace'];

    $result = str_replace($find, $replace, $text);
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab02(task1(1))</title>
</head>
<body>
<form method="post" action="">
    <label for="text">Текст:</label><br>
    <textarea name="text" id="text" rows="4" cols="50"><?php echo isset($text) ? htmlspecialchars($text) : ''; ?></textarea><br><br>

    <label for="find">Знайти:</label><br>
    <input type="text" name="find" id="find" value="<?php echo isset($find) ? htmlspecialchars($find) : ''; ?>"><br><br>

    <label for="replace">Замінити на:</label><br>
    <input type="text" name="replace" id="replace" value="<?php echo isset($replace) ? htmlspecialchars($replace) : ''; ?>"><br><br>

    <input type="submit" value="Заміна">
</form>
<h3>Результат:</h3>
<textarea rows="4" cols="50" readonly><?php echo isset($result) ? htmlspecialchars($result) : ''; ?></textarea>
</body>
</html>
