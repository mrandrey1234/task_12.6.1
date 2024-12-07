<?php
echo 'Задание 1 </br>';

function getFullnameFromParts($str1, $str2, $str3){
    return $str1 . " " . $str2 . " " . $str3;
}

echo getFullnameFromParts("Иванов", "Иван", "Иванович");

echo '</br>';

function getPartsFromFullname($FIO){

    $new_arr = explode(' ', $FIO);

    if(count($new_arr) !== 3){
        return '';
    }

    $new_arr['surname'] = $new_arr[0];
    $new_arr['name'] = $new_arr[1];
    $new_arr['patronomyc'] = $new_arr[2];
    unset($new_arr[0], $new_arr[1], $new_arr[2]);

    return $new_arr;
}

var_dump(getPartsFromFullname('Иванов Иван Иванович'));
echo '</br>';                        
?>