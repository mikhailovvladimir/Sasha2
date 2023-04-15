<?php

// проверяем на пустоту каждое значение переданных параметров
function checkEmpty($values)
{
    if (empty($values)) { // если параметры вообще не передавали тогда сразу фолс
        return false;
    }

    foreach ($values as $value) { // если какие - топараметры переданны то тогда проверяем каждый из них
        if (empty($value)) { 
            return false;
        }
    }

    return true;
}

function checkOperation($operation)
{
    $listOperations = ['+', '-', '*', '/'];
    // in_array проверяем есть ли значение в масссиве, почитай в документации
    if (is_string($operation) and in_array($operation, $listOperations)) { // если передана строка и она содержит массив с + или - или * или /, тогда ок
        return true;                                                       // в остальных случаях нахуй идет
    }

    return false;
}

function checkInteger($values)
{
    $listOperations = ['+', '-', '*', '/'];
    // in_array проверяет есть ли значение в масссиве, почитай в документации
    foreach ($values as $value) {
        if (!is_numeric($value) and !in_array($value, $listOperations)) { 
            return false;
        }
    }

    return true;
}

// список ошибок хранится в одном месте и возвращается в виде массива
function getErrors()
{
    return [
        'emptyParam' => 'Заполните пожалуйста форму перед отправкой',
        'ItIsNotNumber' => 'Передайте пожалуйста число',
        'falseOperation' => 'Не корректно передана операция'
    ];
}

// валдиция - проверка на правильность ввовдимых данных из формы
function runValidate($request) 
{
    $error = getErrors();
    if (!checkEmpty($request)) {
        return ['error' => $error['emptyParam']];
    }

    if (!checkOperation($request['operation'])) {
        return ['error' => $error['falseOperation']];
    }

    if (!checkInteger($request)) {
        return ['error' => $error['ItIsNotNumber']];
    }

    // если ниодна ошибка не возвратила ответ выше, то возвращаем все данные которые отправили в форме
    return $request;
}

