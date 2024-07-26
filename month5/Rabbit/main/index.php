<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>Банковская Выписка</title>
</head>
<body>
<h1>Запрос на Генерацию Выписки</h1>
<form action="rabbit.php" method="post">
    <label for="start_date">Дата начала:</label>
    <input type="date" id="start_date" name="start_date" required>
    <br><br>
    <label for="end_date">Дата конца:</label>
    <input type="date" id="end_date" name="end_date" required>
    <br><br>
    <label for="email">Email для отправки:</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <input type="submit" value="Отправить">
</form>
</body>
</html>