<?php
require __DIR__ . '/validate.php'; // подключаем файл с функциями

$operators = runValidate($_GET); // если возвращаеться  массив с ключом error значит пришла ошибка
if (isset($operators['error'])) {
    return $operators['error'];  // возвращаем ошибку
}

// если ошибки не было то работаем дальше
$result = $operators['numberOne'] . ' ' . $operators['operation'] . ' ' . $operators['numberTwo'] . ' = ';

$calculation = 0;
if ($operators['operation'] == '+') {
    $calculation = $operators['numberOne'] + $operators['numberTwo'];
}

if ($operators['operation'] == '-') {
    $calculation = $operators['numberOne'] - $operators['numberTwo'];
}

if ($operators['operation'] == '*') {
    $calculation = $operators['numberOne'] * $operators['numberTwo'];
}

if ($operators['operation'] == '/') {
    $calculation = $operators['numberOne'] / $operators['numberTwo'];
}

return $result . $calculation;