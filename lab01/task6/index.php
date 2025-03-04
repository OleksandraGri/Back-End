<?php
echo '<pre>';
echo "Полину в мріях в купель океану,<br>";
echo "Відчую <b>шовковистість</b> глибини,<br>";
echo "Чарівні мушлі з дна собі дістану,<br>";
echo "  Щоб <b><i>взимку</i></b><br>";
echo "      <U>тішили</U><br>";
echo "          мене <br>";
echo "             вони…";
echo '<pre>';

function generateTable($rows, $cols) {
    echo "<table border='1' style='border-collapse: collapse;'>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            $color = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
            echo "<td style='width: 50px; height: 50px; background-color: $color;'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function generateSquares($n) {
    echo "<div style='position: relative; width: 100vw; height: 100vh; background-color: black;'>";
    for ($i = 0; $i < $n; $i++) {
        $size = rand(20, 100);
        $top = rand(0, 90) . "vh";
        $left = rand(0, 90) . "vw";
        echo "<div style='position: absolute; width: {$size}px; height: {$size}px; background-color: red; top: $top; left: $left;'></div>";
    }
    echo "</div>";
}

echo "<h3>Завдання 1</h3>";
generateTable(5, 5);

echo "<h3>Завдання 2</h3>";
generateSquares(8);


