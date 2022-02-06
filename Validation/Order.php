<!--Командир корабля отдает приказ своей команде. Но приказы должны быть лаконичными (короткая фраза) и из набора понятных
для матросов приказов (напр. На Абордаж! Задрать швартовые!).
Напишите функцию, которая поверяет приказ командира, в случае ошибки вернуть сообщение
(422-неверно отправленные данные N)-->

<!--Проверить типы данных, длина команды минимум и максимум, находится для в наборе уже существующих команд
(создаете отдельный массив команд)-->
<?php

function validateMin ($order, $min_value)
{
    if(mb_strlen($order) <= $min_value){
        return "Error 422 - Very few characters in the order.";
    }
    return "Min number of characters are ok. ";
}

//проверяем максимальную длину символов в Приказе
function validateMax ($order, $max_value)
{
    if(mb_strlen($order) >= $max_value){
        return "Error 422 - Very much characters in the order.";
    }
    return "Max number of characters are ok. ";
}

//Валидация на типы данных в приказе
function validateString($order)
{
    if (is_string($order)) {
        return "Type of order is string";
    }
    return "Type of order is not string";
}

//Определяем находится ли приказ среди уже существующей команды
function validateInArray($order, $order_array){
    if (in_array($order,$order_array)){
        echo "This order exist";
    } else {
        echo "This order not exist";
    }
}

function validate ($order){
    $order_array=[
        "Вперед",
        "На абордаж",
        "Чужак"
    ];
    $rules = 'string|min:4|max:12|inArray';
    $arr_rules = explode("|", $rules);
    $messages = [];

    foreach ($arr_rules as $rule) {
        if ($rule == 'string')
            print validateString($order);
        if ($rule == 'min')
           print validateMin($order,4);
        if ($rule == 'max')
            print validateMax($order,12);
        if ($rule == $order_array)
           print validateInArray($order,$order_array) . "<br>";
    }
    return $messages;
}

$order = readline("Give your order, captain!");
print_r(validate($order));

