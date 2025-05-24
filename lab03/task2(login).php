<?php
// Стартуємо сесію
session_start();

// Перевіряємо, чи є вже активна сесія
if (isset($_SESSION['username'])) {
    // Якщо користувач авторизований, виводимо привітання
    echo "<h1>Добрий день, " . $_SESSION['username'] . "!</h1>";
    echo '<p><a href="task2(logout).php">Вийти</a></p>';
} else {
    // Якщо сесії немає, відображаємо форму авторизації
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Перевіряємо, чи введені правильні логін і пароль
        if ($_POST['username'] == 'Admin' && $_POST['password'] == '123') {
            // Якщо правильний логін і пароль, зберігаємо сесію
            $_SESSION['username'] = 'Admin';
            echo "<h1>Добрий день, Admin!</h1>";
            echo '<p><a href="task2(logout).php">Вийти</a></p>';
        } else {
            // Якщо логін або пароль невірні
            echo "<h1>Невірний логін або пароль!</h1>";
        }
    }

    // Форма авторизації
    ?>
    <h1>Авторизація</h1>
    <form method="POST" action="">
        <label for="username">Логін:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Увійти</button>
    </form>
    <?php
}
?>
