<?php
require_once __DIR__ . '/autoload.php';

use Models\Circle;

$circle1 = new Circle(0, 0, 5);
$circle2 = new Circle(6, 0, 3);

echo $circle1 . "<br>";
echo $circle2 . "<br>";

if ($circle1->intersectsWith($circle2)) {
    echo "Кола перетинаються<br>";
} else {
    echo "Кола не перетинаються<br>";
}
