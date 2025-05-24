<?php
require_once __DIR__ . '/autoload.php';

use Models\Circle;

// Створюємо об'єкт
$circle = new Circle(5.0, 10.0, 3.5);

// Перевірка геттера
echo "Центр: ({$circle->getX()}, {$circle->getY()})<br>";
echo "Радіус: {$circle->getRadius()}<br>";

// Змінимо координати і радіус
$circle->setX(8.0);
$circle->setY(12.0);
$circle->setRadius(4.2);

// Перевіримо __toString()
echo $circle . "<br>";
