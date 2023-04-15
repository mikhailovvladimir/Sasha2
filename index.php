<html>
<head>
    <title>Калькулятор</title>
</head>
<body>
<form action="/result.php" method="GET">
    <input type="text" name="numberOne">
    <select name="operation">
        <option value="+">плюс</option>
        <option value="-">минус</option>
        <option value="*">умножить</option>
        <option value="/">разделить</option>
    </select>
    <input type="text" name="numberTwo">
    <input type="submit" value="Посчитать">
</form>
</body>
</html>