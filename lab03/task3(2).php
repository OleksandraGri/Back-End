<?php
// Функції для роботи з файлами
function processFiles() {
    $file1 = 'file1.txt';
    $file2 = 'file2.txt';

    // Читаємо вміст файлів
    $words1 = file_exists($file1) ? explode(' ', file_get_contents($file1)) : [];
    $words2 = file_exists($file2) ? explode(' ', file_get_contents($file2)) : [];

    // Лічильники слів
    $count1 = array_count_values($words1);
    $count2 = array_count_values($words2);

    // a) Слова, які є тільки в першому файлі
    $onlyInFirst = array_diff_key($count1, $count2);
    file_put_contents('only_in_first.txt', implode(' ', array_keys($onlyInFirst)));

    // b) Слова, які є в обох файлах
    $inBoth = array_intersect_key($count1, $count2);
    file_put_contents('in_both.txt', implode(' ', array_keys($inBoth)));

    // c) Слова, які зустрічаються більше 2 разів в кожному файлі
    $moreThanTwo1 = array_filter($count1, fn($count) => $count > 2);
    $moreThanTwo2 = array_filter($count2, fn($count) => $count > 2);
    $moreThanTwoInBoth = array_intersect_key($moreThanTwo1, $moreThanTwo2);
    file_put_contents('more_than_two_in_both.txt', implode(' ', array_keys($moreThanTwoInBoth)));
}

// Обробка форми для видалення файлу
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filename'])) {
    $filename = $_POST['filename'];
    if (file_exists($filename)) {
        unlink($filename);
        $message = "Файл $filename був видалений";
    } else {
        $message = "Файл $filename не існує";
    }
}

// Обробляємо файли при першому завантаженні
if (!file_exists('only_in_first.txt')) {
    processFiles();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Робота з файлами</title>
</head>
<body>
<h1>Видалити файл</h1>
<?php if (isset($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form method="POST">
    <label>Введіть ім'я файлу для видалення:</label>
    <select name="filename">
        <option value="only_in_first.txt">only_in_first.txt</option>
        <option value="in_both.txt">in_both.txt</option>
        <option value="more_than_two_in_both.txt">more_than_two_in_both.txt</option>
    </select>
    <button type="submit">Видалити</button>
</form>
</body>
</html>