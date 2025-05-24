<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Робота з масивами</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h2 { color: #2c3e50; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        pre { background: #f5f5f5; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
<h1>Робота з масивами в PHP</h1>

<?php
function findDuplicates($array) {
    $counts = array_count_values($array);
    $duplicates = array();
    foreach ($counts as $value => $count) {
        if ($count > 1) {
            $duplicates[] = $value;
        }
    }
    return $duplicates;
}

$array = array(1, 2, 3, 2, 4, 5, 4, 6);
echo "<h2>1. Елементи, що повторюються</h2>";
echo "<p>Масив: [" . implode(', ', $array) . "]</p>";
echo "<p>Дублікати: [" . implode(', ', findDuplicates($array)) . "]</p>";

function generatePetName($parts, $length = null) {
    if ($length === null) {
        $length = rand(2, 4);
    }
    $name = '';
    for ($i = 0; $i < $length; $i++) {
        $name .= $parts[array_rand($parts)];
    }
    return ucfirst($name);
}

$nameParts = array('мур', 'пух', 'шер', 'чик');
echo "<h2>2. Генератор імен для тварин</h2>";
echo "<p>Згенеровані імена: ";
for ($i = 0; $i < 5; $i++) {
    echo generatePetName($nameParts) . ", ";
}
echo "</p>";

function createArray($minLen = 3, $maxLen = 7, $minVal = 10, $maxVal = 20) {
    $length = rand($minLen, $maxLen);
    $array = array();
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand($minVal, $maxVal);
    }
    return $array;
}

function processArrays($a, $b) {
    $merged = array_merge($a, $b);
    $unique = array_unique($merged);
    sort($unique);
    return $unique;
}

$arr1 = createArray();
$arr2 = createArray();
echo "<h2>3. Робота з двома масивами</h2>";
echo "<p>Масив 1: [" . implode(', ', $arr1) . "]</p>";
echo "<p>Масив 2: [" . implode(', ', $arr2) . "]</p>";
echo "<p>Результат: [" . implode(', ', processArrays($arr1, $arr2)) . "]</p>";

function sortUsers(&$users, $by = 'name') {
    if ($by === 'age') {
        uasort($users, function($a, $b) {
            if ($a == $b) return 0;
            return ($a < $b) ? -1 : 1;
        });
    } else {
        ksort($users);
    }
}

$users = array('Іван' => 25, 'Петро' => 30, 'Марія' => 22, 'Олена' => 28);
echo "<h2>4. Сортування користувачів</h2>";

echo "<h3>Початковий масив:</h3>";
echo "<pre>" . print_r($users, true) . "</pre>";

sortUsers($users);
echo "<h3>За іменем:</h3>";
echo "<pre>" . print_r($users, true) . "</pre>";

sortUsers($users, 'age');
echo "<h3>За віком:</h3>";
echo "<pre>" . print_r($users, true) . "</pre>";
?>
</body>
</html>