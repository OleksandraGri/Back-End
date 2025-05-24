<?php
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($login) && !empty($password)) {
        $dir = 'users/' . $login;

        if (file_exists($dir)) {
            // Видаляємо папку з усім вмістом
            if (deleteDirectory($dir)) {
                $success = "Папка користувача $login була успішно видалена";
            } else {
                $error = "Не вдалося видалити папку $login";
            }
        } else {
            $error = "Папка для користувача $login не існує";
        }
    } else {
        $error = "Будь ласка, введіть логін та пароль";
    }
}

// Функція для рекурсивного видалення директорії
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Видалення папки</title>
</head>
<body>
<h1>Видалення папки користувача</h1>

<?php if ($error): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<?php if ($success): ?>
    <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
<?php endif; ?>

<form method="POST">
    <div>
        <label for="login">Логін:</label>
        <input type="text" name="login" id="login" required>
    </div>
    <div>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit">Видалити папку</button>
</form>
</body>
</html>