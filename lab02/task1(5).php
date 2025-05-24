<?php
function generatePassword($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}|;:,.<>?';
    $password = '';
    $charactersLength = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
    }

    return $password;
}

function checkPasswordStrength($password) {
    if (strlen($password) < 8) {
        return 'Пароль повинен бути не менше 8 символів.';
    }

    if (!preg_match('/[A-Z]/', $password)) {
        return 'Пароль повинен містити хоча б одну велику літеру.';
    }

    if (!preg_match('/[a-z]/', $password)) {
        return 'Пароль повинен містити хоча б одну малу літеру.';
    }

    if (!preg_match('/[0-9]/', $password)) {
        return 'Пароль повинен містити хоча б одну цифру.';
    }

    if (!preg_match('/[\W_]/', $password)) {
        return 'Пароль повинен містити хоча б один спеціальний символ.';
    }

    return 'Пароль є міцним.';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['generate'])) {
        $length = $_POST['length'];
        $password = generatePassword($length);
    }

    if (isset($_POST['check'])) {
        $passwordToCheck = $_POST['passwordToCheck'];
        $passwordStrength = checkPasswordStrength($passwordToCheck);
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab02(task1(5))</title>
</head>
<body>
<h2>Генератор паролів</h2>

<h3>1. Генерація випадкового пароля</h3>
<form method="post" action="">
    <label for="length">Введіть довжину пароля:</label><br>
    <input type="number" name="length" id="length" min="8" value="8"><br><br>
    <input type="submit" name="generate" value="Згенерувати пароль"><br><br>
</form>

<?php if (isset($password)): ?>
    <h4>Згенерований пароль:</h4>
    <p><?php echo htmlspecialchars($password); ?></p>
<?php endif; ?>

<h3>2. Перевірка міцності пароля</h3>
<form method="post" action="">
    <label for="passwordToCheck">Введіть пароль для перевірки:</label><br>
    <input type="text" name="passwordToCheck" id="passwordToCheck"><br><br>
    <input type="submit" name="check" value="Перевірити пароль"><br><br>
</form>

<?php if (isset($passwordStrength)): ?>
    <h4>Результат перевірки пароля:</h4>
    <p><?php echo $passwordStrength; ?></p>
<?php endif; ?>
</body>
</html>

