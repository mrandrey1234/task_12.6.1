<?php
ob_start();
require('task3.php');
ob_get_clean();

function getGenderDescription($arr){
    $all_person = count($arr);
    $male_count = 0;
    $female_count = 0;
    $unknown_count = 0;

    foreach($arr as $person){
        $gender = getGenderFromName($person['fullname']);

        if($gender === "Мужской пол"){
            $male_count++;
        }
        else if($gender === "Женский пол"){
            $female_count++;
        }
        else{
            $unknown_count++;
        }
    }

    $male_percent = round(($male_count / $all_person) * 100, 1);
    $female_percent = round(($female_count / $all_person) * 100, 1);
    $unknown_percent = round(($unknown_count / $all_person) * 100, 1);

    return "Гендерный состав аудитории:</br>" .
            "---------------------------</br>" .
            "Мужчины - {$male_percent}%</br>" .
            "Женщины - {$female_percent}%</br>" .
            "Не удалось определить - {$unknown_percent}%";
}

echo getGenderDescription($example_persons_array);
?>