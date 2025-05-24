<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    $date1Obj = DateTime::createFromFormat('d-m-Y', $date1);
    $date2Obj = DateTime::createFromFormat('d-m-Y', $date2);

    $interval = $date1Obj->diff($date2Obj);

    $daysDifference = $interval->days;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab02(task1(4))</title>
</head>
<body>
<h2>Визначення кількості днів між датами</h2>
<form method="post" action="">
    <label for="date1">Перша дата (День-Місяць-Рік):</label><br>
    <input type="text" name="date1" id="date1" value="<?php echo isset($date1) ? htmlspecialchars($date1) : ''; ?>"><br><br>

    <label for="date2">Друга дата (День-Місяць-Рік):</label><br>
    <input type="text" name="date2" id="date2" value="<?php echo isset($date2) ? htmlspecialchars($date2) : ''; ?>"><br><br>

    <input type="submit" value="Обчислити">
</form>

<?php if (isset($daysDifference)): ?>
    <h3>Кількість днів між датами:</h3>
    <p><?php echo $daysDifference; ?> днів</p>
<?php endif; ?>
</body>
</html>

