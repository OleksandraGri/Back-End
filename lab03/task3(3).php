<?php
$inputFile = 'file_task3.txt';
$outputFile = 'sorted_words.txt';

if (file_exists($inputFile)) {
    // Читаємо вміст файлу
    $content = file_get_contents($inputFile);

    // Розділяємо слова
    $words = preg_split('/\s+/', trim($content));

    // Сортуємо слова
    sort($words);

    // Зберігаємо відсортовані слова
    file_put_contents($outputFile, implode(' ', $words));

    echo "Слова були відсортовані та збережені у файлі $outputFile";
} else {
    echo "Вхідний файл $inputFile не знайдено";
}
?>