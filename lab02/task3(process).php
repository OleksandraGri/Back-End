<?php
session_start();

// Обробка даних форми
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Збираємо дані
    $form_data = array(
        'login' => isset($_POST['login']) ? $_POST['login'] : '',
        'gender' => isset($_POST['gender']) ? $_POST['gender'] : '',
        'city' => isset($_POST['city']) ? $_POST['city'] : '',
        'games' => isset($_POST['games']) ? $_POST['games'] : array(),
        'about' => isset($_POST['about']) ? $_POST['about'] : '',
        'password_mismatch' => false
    );

    // Перевірка паролів
    $password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
    $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
    if ($password1 !== $password2) {
        $form_data['password_mismatch'] = true;
        $form_data['password1_length'] = strlen($password1);
        $form_data['password2_length'] = strlen($password2);
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_name = uniqid() . '_' . basename($_FILES['photo']['name']);
        $target_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
            $form_data['photo_path'] = $target_path;
        }
    }

    $_SESSION['form_data'] = $form_data;
}

$display_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array(
    'password_mismatch' => false,
    'gender' => '',
    'city' => '',
    'games' => array(),
    'about' => '',
    'photo_path' => ''
);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Результати реєстрації</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .result { max-width: 600px; }
        .photo { max-width: 200px; max-height: 200px; }
        .error { color: red; }
    </style>
</head>
<body>
<h1>Результати реєстрації</h1>

<div class="result">
    <?php if ($display_data['password_mismatch']): ?>
        <p class="error"><strong>Пароль:</strong> не співпадає (перший - <?php echo $display_data['password1_length']; ?> символів, другий - <?php echo $display_data['password2_length']; ?> символів)</p>
    <?php endif; ?>

    <p><strong>Логін:</strong> <?php echo htmlspecialchars($display_data['login']); ?></p>
    <p><strong>Стать:</strong> <?php echo htmlspecialchars($display_data['gender']); ?></p>
    <p><strong>Місто:</strong> <?php echo htmlspecialchars($display_data['city']); ?></p>

    <p><strong>Улюблені ігри:</strong><br>
        <?php
        if (!empty($display_data['games'])) {
            echo implode("<br>", array_map('htmlspecialchars', $display_data['games']));
        } else {
            echo 'Не обрано';
        }
        ?>
    </p>

    <p><strong>Про себе:</strong><br><?php echo nl2br(htmlspecialchars($display_data['about'])); ?></p>

    <?php if (!empty($display_data['photo_path'])): ?>
        <p><strong>Фотографія:</strong><br>
            <img class="photo" src="<?php echo htmlspecialchars($display_data['photo_path']); ?>" alt="Фото користувача"></p>
    <?php endif; ?>

    <p><a href="task3(index).php">Повернутися на головну сторінку</a></p>
</div>
</body>
</html>