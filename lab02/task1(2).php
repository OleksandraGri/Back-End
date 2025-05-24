<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cities = $_POST['cities'];

    $citiesArray = explode(' ', $cities);

    sort($citiesArray);

    $sortedCities = implode(' ', $citiesArray);
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab02(task1(2))</title>
</head>
<body>
<h2>Сортування міст</h2>
<form method="post" action="">
    <label for="cities">Введіть назви міст (через пробіл):</label><br>
    <input type="text" name="cities" id="cities" value="<?php echo isset($cities) ? htmlspecialchars($cities) : ''; ?>"><br><br>

    <input type="submit" value="Сортувати">
</form>

<?php if (isset($sortedCities)): ?>
    <h3>Міста в алфавітному порядку:</h3>
    <p><?php echo htmlspecialchars($sortedCities); ?></p>
<?php endif; ?>
</body>
</html>
