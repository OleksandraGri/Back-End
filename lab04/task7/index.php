<?php
class FileManager {
    // Статичне поле, що містить директорію з файлами
    public static $dir = 'text';

    // Статичний метод для запису в файл
    public static function writeToFile(string $filename, string $content): void {
        $filePath = self::$dir . '/' . $filename;

        // Перевіряємо, чи існує файл, і додаємо текст
        if (file_exists($filePath)) {
            file_put_contents($filePath, $content . PHP_EOL, FILE_APPEND);
            echo "Вміст дописано в файл {$filename}.<br>";
        } else {
            echo "Файл {$filename} не знайдений!<br>";
        }
    }

    // Статичний метод для читання вмісту файлу
    public static function readFile(string $filename): void {
        $filePath = self::$dir . '/' . $filename;

        if (file_exists($filePath)) {
            $content = file_get_contents($filePath);
            echo "Вміст файлу {$filename}:<br>{$content}<br>";
        } else {
            echo "Файл {$filename} не знайдений!<br>";
        }
    }

    // Статичний метод для очищення вмісту файлу
    public static function clearFile(string $filename): void {
        $filePath = self::$dir . '/' . $filename;

        if (file_exists($filePath)) {
            file_put_contents($filePath, ''); // Очищаємо вміст файлу
            echo "Вміст файлу {$filename} очищено.<br>";
        } else {
            echo "Файл {$filename} не знайдений!<br>";
        }
    }
}

// Створення директорії і файлів
if (!file_exists('text')) {
    mkdir('text');
}

file_put_contents('text/file1.txt', "Текст у файл 1.");
file_put_contents('text/file2.txt', "Текст у файл 2.");
file_put_contents('text/file3.txt', "Текст у файл 3.");

// Перевірка роботи всіх методів
FileManager::writeToFile('file1.txt', "Додатковий текст.");
FileManager::readFile('file1.txt');
FileManager::clearFile('file1.txt');
FileManager::readFile('file1.txt');
?>
