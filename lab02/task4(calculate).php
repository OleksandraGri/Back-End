<?php
include 'task4(func).php';

if (isset($_POST['x'])) {
    $x = $_POST['x'];
} else {
    die("Не введено значення x.");
}

$x_y = power($x, $x);
$x_fact = factorial($x);
$my_tg_result = my_tg($x);
$sin_x = my_sin($x);
$cos_x = my_cos($x);
$tg_x = my_tg($x);

echo "<table border='1'>
        <tr>
            <th>x^y</th>
            <th>x!</th>
            <th>my_tg(x)</th>
            <th>sin(x)</th>
            <th>cos(x)</th>
            <th>tg(x)</th>
        </tr>
        <tr>
            <td>{$x_y}</td>
            <td>{$x_fact}</td>
            <td>{$my_tg_result}</td>
            <td>{$sin_x}</td>
            <td>{$cos_x}</td>
            <td>{$tg_x}</td>
        </tr>
      </table>";
?>
