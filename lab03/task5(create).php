<?php
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($login) && !empty($password)) {
        $dir = 'users/' . $login;

        if (!file_exists($dir)) {
            // Створюємо основну папку
            if (!mkdir($dir, 0755, true)) {
                $error = "Не вдалося створити директорію $dir";
            } else {
                // Створюємо підпапки
                $subdirs = ['video', 'music', 'photo'];
                foreach ($subdirs as $subdir) {
                    if (!mkdir("$dir/$subdir", 0755)) {
                        $error = "Не вдалося створити піддиректорію $subdir";
                        break;
                    }
                }

                if (empty($error)) {
                    // Створюємо файли
                    $files = [
                        "$dir/video/video1.txt" => "Video file 1",
                        "$dir/music/music1.txt" => "Music file 1",
                        "$dir/photo/photo1.txt" => "Photo file 1"
                    ];

                    foreach ($files as $filename => $content) {
                        if (file_put_contents($filename, $content) === false) {
                            $error = "Не вдалося створити файл $filename";
                            break;
                        }
                    }

                    if (empty($error)) {
                        $success = "Папка для користувача $login була успішно створена";
                    }
                }
            }
        } else {
            $error = "Папка для користувача $login вже існує";
        }
    } else {
        $error = "Будь ласка, введіть логін та пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Створення папки</title>
</head>
<body>
<h1>Створення папки користувача</h1>

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
    <button type="submit">Створити папку</button>
</form>
</body>
</html>