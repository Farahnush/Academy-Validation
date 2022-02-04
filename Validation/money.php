<!--Командир корабля отдает приказ своей команде. Но приказы должны быть лаконичными (короткая фраза) и из набора понятных
для матросов приказов (напр. На Абордаж! Задрать швартовые!).
Напишите функцию, которая поверяет приказ командира, в случае ошибки вернуть сообщение
(422-неверно отправленные данные N)-->

<!--Проверить типы данных, длина команды минимум и максимум, находится для в наборе уже существующих команд
(создаете отдельный массив команд)-->
<?php
$order = [
        'Вперед',
        'На абордаж',
        'Рифы'
];

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
function checkDateType($order)
{
    if (is_string($order)) {
        return "Type of order is string";
    }
    return "Type of order is not string";
}

//Определяем находится ли приказ среди уже существующей команды

if (in_array('Вперед',$order)){
    echo "This order exist";
} else{
    echo "This order not exist";
}
$order = readline("Give your order, captain!");

echo validateMin($order,6) . "<br>";
echo validateMax($order,12) . "<br>";
echo checkDateType($order) . "<br>";

