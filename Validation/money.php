<!--Командир корабля отдает приказ своей команде. Но приказы должны быть лаконичными (короткая фраза) и из набора понятных
для матросов приказов (напр. На Абордаж! Задрать швартовые!).
Напишите функцию, которая поверяет приказ командира, в случае ошибки вернуть сообщение
(422-неверно отправленные данные N)-->

<!--Проверить типы данных, длина команды минимум и максимум, находится для в наборе уже существующих команд
(создаете отдельный массив команд)-->
<?php
//$order = [
//        'Вперед',
//        'На абордаж',
//        'Рифы'
//];

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
function validateInArray($order, $order_array){
    if (in_array($order,$order_array)){
        echo "This order exist";
    } else {
        echo "This order not exist";
    }
}

function order($order){
    $validation_message = validateMin($order, 6) . "<br>";
    $validation_message .= validateMax($order,12) . "<br>";
    $validation_message .= checkDateType($order) . "<br>";
    $order_array =[
            'Вперед',
            'Тонем',
            'Обедим'
    ];
    $validation_message .= validateInArray($order,$order_array). "<br>";
    return $validation_message;
}
$order = readline("Give your order, captain!");
echo order($order);

