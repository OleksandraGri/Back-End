<?php
// Стартуємо сесію
session_start();

// Видаляємо дані сесії
session_unset();

// Знищуємо сесію
session_destroy();

// Перенаправляємо на сторінку авторизації
header("Location: task2(login).php");
exit();
?>
