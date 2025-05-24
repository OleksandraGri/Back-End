<?php
session_start();

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + 180*24*60*60, '/');
    header('Location: task3(index).php');
    exit;
}

$current_lang = 'Українська';
if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
    switch ($lang) {
        case 'ukr': $current_lang = 'Українська'; break;
        case 'eng': $current_lang = 'Англійська'; break;
        case 'de': $current_lang = 'Німецька'; break;
    }
}

$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Форма реєстрації</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 500px; }
        .form-group { margin-bottom: 15px; }
        label { display: inline-block; width: 150px; }
        .language-selector { margin: 20px 0; }
        .language-selector img { width: 30px; margin-right: 10px; }
        .error { color: red; }
    </style>
</head>
<body>
<h1>Форма реєстрації</h1>

<div class="language-selector">
    <p><strong>Вибрана мова:</strong> <?php echo htmlspecialchars($current_lang); ?></p>
    <a href="task3(index).php?lang=ukr"><img src="https://flagcdn.com/w20/ua.png" alt="Українська"></a>
    <a href="task3(index).php?lang=eng"><img src="https://flagcdn.com/w20/gb.png" alt="Англійська"></a>
    <a href="task3(index).php?lang=de"><img src="https://flagcdn.com/w20/de.png" alt="Німецька"></a>
</div>

<form action="task3(process).php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="login">Логін:</label>
        <input type="text" id="login" name="login" value="<?php echo isset($form_data['login']) ? htmlspecialchars($form_data['login']) : ''; ?>">
    </div>

    <div class="form-group">
        <label for="password1">Пароль:</label>
        <input type="password" id="password1" name="password1" value="">
    </div>

    <div class="form-group">
        <label for="password2">Пароль (ще раз):</label>
        <input type="password" id="password2" name="password2" value="">
        <?php if (isset($form_data['password_mismatch']) && $form_data['password_mismatch']): ?>
            <span class="error">Паролі не співпадають!</span>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <input type="radio" id="male" name="gender" value="чоловік" <?php echo (isset($form_data['gender']) && $form_data['gender'] === 'чоловік') ? 'checked' : ''; ?>>
        <label for="male" style="width: auto;">чоловік</label>

        <input type="radio" id="female" name="gender" value="жінка" <?php echo (isset($form_data['gender']) && $form_data['gender'] === 'жінка') ? 'checked' : ''; ?>>
        <label for="female" style="width: auto;">жінка</label>
    </div>

    <div class="form-group">
        <label for="city">Місто:</label>
        <select id="city" name="city">
            <option value="Житомир" <?php echo (isset($form_data['city']) && $form_data['city'] === 'Житомир' ? 'selected' : ''); ?>>Житомир</option>
            <option value="Київ" <?php echo (isset($form_data['city']) && $form_data['city'] === 'Київ' ? 'selected' : ''); ?>>Київ</option>
            <option value="Львів" <?php echo (isset($form_data['city']) && $form_data['city'] === 'Львів' ? 'selected' : ''); ?>>Львів</option>
        </select>
    </div>

    <div class="form-group">
        <label>Улюблені гри:</label><br>
        <input type="checkbox" id="football" name="games[]" value="футбол" <?php echo (isset($form_data['games']) && in_array('футбол', $form_data['games']) ? 'checked' : ''); ?>>
        <label for="football" style="width: auto;">футбол</label>

        <input type="checkbox" id="basketball" name="games[]" value="баскетбол" <?php echo (isset($form_data['games']) && in_array('баскетбол', $form_data['games']) ? 'checked' : ''); ?>>
        <label for="basketball" style="width: auto;">баскетбол</label><br>

        <input type="checkbox" id="volleyball" name="games[]" value="волейбол" <?php echo (isset($form_data['games']) && in_array('волейбол', $form_data['games']) ? 'checked' : ''); ?>>
        <label for="volleyball" style="width: auto;">волейбол</label>

        <input type="checkbox" id="chess" name="games[]" value="шахи" <?php echo (isset($form_data['games']) && in_array('шахи', $form_data['games']) ? 'checked' : ''); ?>>
        <label for="chess" style="width: auto;">шахи</label><br>

        <input type="checkbox" id="wot" name="games[]" value="World of Tanks" <?php echo (isset($form_data['games']) && in_array('World of Tanks', $form_data['games']) ? 'checked' : ''); ?>>
        <label for="wot" style="width: auto;">World of Tanks</label>
    </div>

    <div class="form-group">
        <label for="about">Про себе:</label><br>
        <textarea id="about" name="about" rows="4" cols="50"><?php echo isset($form_data['about']) ? htmlspecialchars($form_data['about']) : ''; ?></textarea>
    </div>

    <div class="form-group">
        <label for="photo">Фотографія:</label>
        <input type="file" id="photo" name="photo">
        <?php if (isset($form_data['photo_path']) && !empty($form_data['photo_path'])): ?>
            <p>Поточне фото: <?php echo htmlspecialchars(basename($form_data['photo_path'])); ?></p>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Зареєструватися">
    </div>
</form>
</body>
</html>