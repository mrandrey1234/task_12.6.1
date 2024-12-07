<?php
ob_start();
require('task1.php');
ob_get_clean(); 

echo 'Задание 2 </br>';

function getShortName($FIO){
    $person = getPartsFromFullname($FIO);

    return $person['name'] . ' ' . mb_substr($person['surname'], 0, 1) . '.';
}

echo getShortName('Иванов Иван Иванович');
?>