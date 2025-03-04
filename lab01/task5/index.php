<?php
$num = mt_rand(100,300);

$a = intval($num / 100);
$b = intval(($num / 10) % 10);
$c = $num % 10;

$sum_num = ($a + $b + $c);

$change_num = $c * 100 + $b * 10 + $a;

$digits = str_split($num);
rsort($digits);
$max_num = implode('', $digits);

echo "Число: $num<br/>";
echo "Сума числа: $sum_num<br/>";
echo "Зворотній порядок: $change_num<br/>";
echo "Завдання 3: $max_num<br/>";
echo "Завдання 3: $sum_num$max_num<br/>";
